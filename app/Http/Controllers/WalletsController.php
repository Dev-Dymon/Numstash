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

        // Generate unique reference
        $reference = Str::uuid();

        // Save a pending transaction
        $transaction = Transactions::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'type' => 'credit',
            'reference' => $reference,
            'status' => 'pending',
        ]);

        // Paystack expects kobo (multiply by 100)
        $paystackAmount = $amount * 100;

        return redirect()->to("https://api.paystack.co/transaction/initialize?" . http_build_query([
            'email' => $user->email,
            'amount' => $paystackAmount,
            'reference' => $reference,
            'callback_url' => route('wallet.callback'),
        ]));
    }


    public function handleGatewayCallback(Request $request)
    {
        $reference = $request->query('reference');

        $transaction = Transactions::where('reference', $reference)->first();

        if (!$transaction) {
            return redirect()->route('home')->with('error', 'Transaction not found.');
        }

        // Verify the transaction via Paystack API
        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->get("https://api.paystack.co/transaction/verify/{$reference}");

        if ($response->successful() && $response['data']['status'] === 'success') {
            $transaction->update([
                'status' => 'success'
            ]);

            // Update wallet
            $wallet = Wallets::firstOrCreate(
                ['user_id' => $transaction->user_id],
                ['balance' => 0]
            );

            $wallet->increment('balance', $transaction->amount);

            return redirect()->route('home')->with('success', 'Wallet funded successfully!');
        } else {
            $transaction->update([
                'status' => 'failed'
            ]);

            return redirect()->route('home')->with('error', 'Payment verification failed.');
        }
    }
}
