<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function buyNumber(Request $request)
    {
        $user = auth()->user();
        $wallet = $user->wallet;

        $service = $request->service;
        $serviceKey = $request->service_key;
        $apiPrice = $request->api_price;
        $salePrice = $request->sale_price;
        $requestPremium = $request->request_premium ?? null;
        $state = $request->state ?? null;

        // dd(['user_id' => $user->id], 
        //     ['wallet balance' => $wallet->balance], 
        //     ['Service name' => $service], 
        //     ['Service Key' => $serviceKey], 
        //     ['API price' => ('₦' . $apiPrice)], 
        //     ['Sale price' => ('₦' . $salePrice)], 
        //     ['request_premium' => $requestPremium], 
        //     ['state' => $state],
        // );

        if ($wallet->balance < $salePrice) {
            return back()->with('error', 'Insufficient wallet balance.');
        }

        // Call TextVerify API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('TEXTVERIFY_API_KEY'),
            'Accept' => 'application/json',
        ])->post(env('TEXTVERIFY_BUY_URL'), [
            'service_key' => $serviceKey,
            'request_premium' => $requestPremium,
            'state' => $state,
        ]);

    }
}
