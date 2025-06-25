<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Agent;
use App\Models\Agency;
use App\Models\Listing;
use App\Models\PropertyDetail;
use App\Models\Photo;
use App\Models\Favorite;
use App\Models\Offer;
use App\Models\Transaction;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AgentSeeder::class,
            AgencySeeder::class,
            ListingSeeder::class,
            PropertyDetailSeeder::class,
            PhotoSeeder::class,
            FavoriteSeeder::class,
            OfferSeeder::class,
            TransactionSeeder::class,
        ]);
    }
}
