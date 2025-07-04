<?php

namespace App\Http\Controllers;

use App\Models\Orders;
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
        $requestPremium = $request->request_premium ?? 10;
        $state = $request->state ?? null;

        if ($wallet->balance < $salePrice) {
            return back()->with('error', 'Insufficient wallet balance.');
        }

        // Call TextVerify API
        $response = Http::asForm() // crucial: sends form-data
            ->withHeaders([
                'Authorization' => 'Bearer ' . env('TEXTVERIFY_API_KEY'),
                'Accept' => 'application/json',
            ])
            ->post(env('TEXTVERIFY_BUY_URL'), [
                'service_key' => $serviceKey,
                'request_premium' => $requestPremium,
                'state' => $state,
            ]);



        if (!$response->successful()) {
            return back()->with('error', 'Failed to connect to provider. Please try again.');
        }

        $data = $response->json();

        // dd($response->json());

        if (empty($data) || ($data['status'] ?? '') !== 'success') {
            // $errorMessage = $data['summery'] ?? 'Provider rejected the request. Please try again.';
            return back()->with('error', 'Your network has some issues contact site Admin');
        }

        // deduct sale price from wallet
        $wallet->decrement('balance', $salePrice);

        // save order
        Orders::create([
            'user_id' => $user->id,
            'service' => $service,
            'amount' => $apiPrice,
            'profit' => $salePrice - $apiPrice,
            'order_status' => 'success',
        ]);

        return back()->with('success', 'Number purchased successfully!');
    }

}
