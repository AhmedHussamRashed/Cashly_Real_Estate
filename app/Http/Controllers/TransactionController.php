<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return Transaction::with(['user', 'listing'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'    => 'required|exists:users,id',
            'listing_id' => 'required|exists:listings,id',
            'amount'     => 'required|numeric',
            'status'     => 'required|in:paid,pending,failed',
            'paid_at'    => 'nullable|date',
        ]);

        return Transaction::create($data);
    }

    public function update(Request $request, Transaction $transaction)
    {
        $data = $request->validate([
            'amount'  => 'sometimes|numeric',
            'status'  => 'required|in:paid,pending,failed',
            'paid_at' => 'nullable|date',
        ]);

        $transaction->update($data);
        return $transaction;
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
