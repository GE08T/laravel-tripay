<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nominal;
use App\Models\Transaction;
use App\Http\Controllers\payment\TripayController;

class DonationController extends Controller
{
    public function donate()
    {
        $nominals = Nominal::all();

        $tripay = new TripayController();
        $channels = $tripay->getPaymentChannels();

        return view('donation.index', compact('nominals', 'channels'));
    }

   public function store(Request $request) 
    {
        // Request Transaction in Tripay
        $method = $request->method;
        $amount = $request->amount;

        $tripay = new TripayController();
        $transaction = $tripay->requestTransaction($method, $amount);

        // Create a new data in Transaction Model
        Transaction::create([
            'user_id' => auth()->user()->id,
            'title' => 'Donasi Dari @'.auth()->user()->name,
            'reference' => $transaction->reference,
            'merchant_ref' => $transaction->merchant_ref,
            'total_amount' => $amount,
            'status' => $transaction->status,
        ]);

        return redirect()->route('transaction.show', [
            'reference' => $transaction->reference,
        ]);
    }

    public function show($reference)
    {
        $tripay = new TripayController();
        $detail = $tripay->detailTransaction($reference);

        return view('donation.show', compact('detail'));
    }
}
