<?php

namespace App\Http\Controllers;

use App\Models\AddAmount;
use App\Models\Message;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Wallets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $currency_api = env('CURRENCY_API');
        if (!Cache::has('currency_value')) {
            $response = Http::get($currency_api);

            $currency = $response->json()['conversion_rate'];

            $nigerian_price = Cache::put('currency_value', $currency, now()->addMinutes(60));

        }else {
            $nigerian_price = Cache::get('currency_value');
        }


        $account_response = Http::withToken(env('TEXTVERIFY_API_KEY'))->get(env('TEXTVERIFY_ACCOUNT_BALANCE'));

        if ($account_response->successful()) {
            $account_balance1 = $account_response->json()['data']['balance'];
            $account_balance2 = (int)$account_balance1 * $nigerian_price;
        }

        $transcations = Transactions::orderBy('id', 'DESC')->with('user')->limit(10)->get();
        $users = User::where('usertype', 'user')->count();
        $revenue = Wallets::sum('balance');
        return view("admin.index", compact('users', 'revenue', 'transcations', 'account_balance1', 'account_balance2'));
    }

    public function number()
    {
        $added_amount = AddAmount::select('added_amount')->firstOrFail();

        $currency_url = env('CURRENCY_API');
        $url = env('TEXTVERIFY_BASE_URL');
        $token = env('TEXTVERIFY_API_KEY');

        $response = Http::withToken($token)->get($url);

        if (!Cache::has('currency_value')) {
            $currency_response = Http::timeout(30)->get($currency_url);

            // dd($currency_response->json());
            $nigerian_amount =  $currency_response->json()['conversion_rate'];

            Cache::put('currency_value', $nigerian_amount, now()->addMinutes(60));
        }else {
            $nigerian_amount =  Cache::get('currency_value');
        }

        // response for united kingdom
        if ($response->successful()) {
            // dd($response->json());
            $services = $response->json()['data']['temporary']['United States'];
            $servicesuk = $response->json()['data']['temporary']['United Kingdom'];
            
            return view('admin.number', compact('services', 'servicesuk', 'added_amount', 'nigerian_amount'));
        } else {
            $services = [
                'data' => [
                    'temporary' => [
                        'United States' => [
                            'service' => '',
                            'price' => '',
                            'country' => ''
                        ],
                    ],
                ],
            ];
            $servicesuk = [
                'data' => [
                    'temporary' => [
                        'United Kingdom' => [
                            'service' => '',
                            'price' => '',
                            'country' => ''
                        ],
                    ],
                ],
            ];
            return view('admin.number', compact('services', 'servicesuk', 'added_amount', 'nigerian_amount'));
        }

    }

    public function update_amount(Request $request){
        $request->validate([
            'amount' => 'required|integer|min:0|max:10000',
        ]);

        $amount = $request->amount;
        $response = DB::table('add_amounts')->where('id', 1)->update(['added_amount' => $amount]);

        if ($response) {
            return redirect()->back()->with('success', 'Profit updated successfully');
        }else {
            return redirect()->back()->with('error', 'An error occurred, try again');
        }

    }

    public function message()
    {
        $messages = Message::orderBy('id', 'desc')->paginate(21);
        return view('admin.message', compact('messages'));
    }

    public function setting()
    {
        return view('admin.setting');
    }

    public function update_details(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'string|min:3|max:225',
            'email' => 'email|min:8|max:225',
        ]);

        $user->fill($validated);

        if ($user->save()) {
            return redirect()->route('admin.setting');
        }
        return redirect()->route('admin.setting');
    }

    public function update(Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        // return back()->with('status', 'password-updated');
        return redirect()->route('admin.setting');
    }

    public function delete_message(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $id = $request->id;
        $message = Message::findOrFail($id);

        if ($message->delete()) {
            return redirect()->route('admin.message');
        }

    }

}
