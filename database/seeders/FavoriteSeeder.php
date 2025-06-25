<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Listing;

class FavoriteSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $listings = Listing::pluck('id');

        foreach ($users as $user) {
            Favorite::create([
                'user_id' => $user->id,
                'listing_id' => $listings->random(),
            ]);
        }
    }
}
