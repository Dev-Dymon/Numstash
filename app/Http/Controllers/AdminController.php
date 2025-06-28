<?php

namespace App\Http\Controllers;

use App\Models\AddAmount;
use App\Models\Message;
use App\Models\User;
use App\Models\Wallets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('usertype', 'user')->count();
        $revenue = Wallets::sum('balance');
        return view("admin.index", compact('users', 'revenue'));
    }

    public function number()
    {
        $added_amount = AddAmount::select('added_amount')->firstOrFail();

        $url = env('TEXTVERIFY_BASE_URL');
        $token = env('TEXTVERIFY_API_KEY');

        $response = Http::withToken($token)->get($url);

        // response for united kingdom
        if ($response->successful()) {
            // dd($response->json());
            $services = $response->json()['data']['temporary']['United States'];
            $servicesuk = $response->json()['data']['temporary']['United Kingdom'];
            
            return view('admin.number', compact('services', 'servicesuk', 'added_amount'));
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
            return view('admin.number', compact('services', 'servicesuk', 'added_amount'));
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
