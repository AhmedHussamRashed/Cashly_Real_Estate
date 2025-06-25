<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index()
    {
        return Photo::with('listing')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'listing_id' => 'required|exists:listings,id',
            'path'       => 'required|image|max:2048',
        ]);

        $path = $request->file('path')->store('public/listings');
        $photo = Photo::create([
            'listing_id' => $data['listing_id'],
            'path'       => str_replace('public/', 'storage/', $path),
        ]);

        return $photo;
    }

    public function show(Photo $photo)
    {
        return $photo;
    }

    public function destroy(Photo $photo)
    {
        Storage::delete(str_replace('storage/', 'public/', $photo->path));
        $photo->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
