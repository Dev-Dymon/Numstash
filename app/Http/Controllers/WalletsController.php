<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\Wallets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class WalletsController extends Controller
{
    public function initiatePayment(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:100'
        ]);

        $user = auth()->user();
        $amount = $validated['amount'];
        $reference = Str::uuid(); // generate unique reference

        // Save pending transaction
        Transactions::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'type' => 'credit',
            'reference' => $reference,
            'status' => 'pending',
        ]);

        // Call Paystack API to initialize transaction
        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->post('https://api.paystack.co/transaction/initialize', [
                'email' => $user->email,
                'amount' => $amount * 100, // Paystack expects kobo
                'reference' => $reference,
                'callback_url' => route('wallet.callback'),
                'currency' => 'NGN',
            ]);

        if ($response->failed()) {
            return back()->with('error', 'Unable to initialize payment. Try again.');
        }

        $authUrl = $response['data']['authorization_url'];

        return redirect($authUrl);
    }


    public function handleGatewayCallback(Request $request)
    {
        $reference = $request->query('reference');

        $transaction = Transactions::where('reference', $reference)->first();

        if (!$transaction) {
            return redirect()->route('home')->with('error', 'Transaction not found.');
        }

        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->get("https://api.paystack.co/transaction/verify/{$reference}");

        if ($response->successful() && $response['data']['status'] === 'success') {
            $transaction->update([
                'status' => 'success',
            ]);

            $wallet = Wallets::firstOrCreate(
                ['user_id' => $transaction->user_id],
                ['balance' => 0]
            );

            $wallet->increment('balance', $transaction->amount);

            return redirect()->route('dashboard')->with('success', 'Wallet funded successfully!');
        } else {
            $transaction->update([
                'status' => 'failed',
            ]);

            return redirect()->route('dashboard')->with('error', 'Payment verification failed.');
        }
    }

}
