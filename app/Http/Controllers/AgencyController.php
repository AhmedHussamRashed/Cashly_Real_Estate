<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index()
    {
        return Agency::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string',
            'address' => 'nullable|string',
        ]);

        return Agency::create($data);
    }

    public function show(Agency $agency)
    {
        return $agency;
    }

    public function update(Request $request, Agency $agency)
    {
        $data = $request->validate([
            'name'    => 'sometimes|string',
            'address' => 'nullable|string',
        ]);

        $agency->update($data);
        return $agency;
    }

    public function destroy(Agency $agency)
    {
        $agency->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
