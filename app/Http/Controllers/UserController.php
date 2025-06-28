<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $user = Auth::user()->load('wallet');
        $wallet = $user->wallet;

        $url =  env('TEXTVERIFY_BASE_URL');
        $token = env('TEXTVERIFY_API_KEY');
        $currency = env('CURRENCY_API');

        if (!Cache::has('currency_amount')) {
            $currency_response = Http::timeout(30)->get($currency);
            
            if ($currency_response->successful()) {
                $amount = $currency_response->json()['conversion_rate'];
                Cache::put('currency_amount', $amount, now()->addMinutes(60));
            }else {
                Log::error('Currency API call failed: ' . $currency_response->status());
            }
        }else {
            $amount = Cache::get('currency_amount');
        }

        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->get($url);

        if ($response->successful()) {
            // dd($response->json());
            $services = $response->json()['data']['temporary']['United States'];
            $servicesuk = $response->json()['data']['temporary']['United Kingdom'];
            return view('user.dashboard', compact('services', 'servicesuk', 'wallet', 'amount'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function send_message(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|max:225|string',
            'email' => 'required|email|min:8|max:255',
            'message' => 'required|string|min:8|max:1024',
        ]);

        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;


        // $message->fill($validated);

        // var_dump($message->toArray());
        if ($message->save()) {
            return redirect()->route('home')->with('success', 'Message sent successfully');
        } else {
            return redirect()->route('home')->with('error', 'Failed to send message. Please try again.');
        }        

    }
    
}
