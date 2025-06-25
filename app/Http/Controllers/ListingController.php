<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        return Listing::with(['agent', 'propertyDetail', 'photos'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'agent_id'     => 'required|exists:agents,id',
            'title'        => 'required|string',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric',
            'location'     => 'required|string',
            'status'       => 'required|in:available,sold,pending',
            'type'         => 'required|string',
            'featured'     => 'boolean',
        ]);

        return Listing::create($data);
    }

    public function show(Listing $listing)
    {
        return $listing->load(['agent', 'propertyDetail', 'photos']);
    }

    public function update(Request $request, Listing $listing)
    {
        $data = $request->validate([
            'title'        => 'sometimes|string',
            'description'  => 'nullable|string',
            'price'        => 'sometimes|numeric',
            'location'     => 'sometimes|string',
            'status'       => 'sometimes|in:available,sold,pending',
            'type'         => 'sometimes|string',
            'featured'     => 'boolean',
        ]);

        $listing->update($data);
        return $listing;
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
