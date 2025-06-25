<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        return Favorite::with(['user', 'listing'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'    => 'required|exists:users,id',
            'listing_id' => 'required|exists:listings,id',
        ]);

        return Favorite::create($data);
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
