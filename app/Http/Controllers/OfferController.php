<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        return Offer::with(['user', 'listing'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'    => 'required|exists:users,id',
            'listing_id' => 'required|exists:listings,id',
            'amount'     => 'required|numeric',
            'status'     => 'required|in:pending,accepted,rejected',
        ]);

        return Offer::create($data);
    }

    public function update(Request $request, Offer $offer)
    {
        $data = $request->validate([
            'amount' => 'sometimes|numeric',
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $offer->update($data);
        return $offer;
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
