<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Offer;
use App\Models\User;
use App\Models\Listing;

class OfferSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $listings = Listing::pluck('id');

        foreach ($users as $user) {
            Offer::create([
                'user_id' => $user->id,
                'listing_id' => $listings->random(),
                'amount' => rand(40000, 250000),
                'message' => "I am interested in this property.",
                'status' => 'pending',
            ]);
        }
    }
}
