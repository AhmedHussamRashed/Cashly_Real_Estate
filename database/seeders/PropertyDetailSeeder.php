<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Listing;
use App\Models\PropertyDetail;

class PropertyDetailSeeder extends Seeder
{
    public function run(): void
    {
        $listings = Listing::all();

        foreach ($listings as $listing) {
            PropertyDetail::create([
                'listing_id' => $listing->id,
                'bedrooms' => rand(1, 5),
                'bathrooms' => rand(1, 3),
                'area' => rand(80, 350),
                'year_built' => rand(1990, 2022),
                'amenities' => 'Pool,Gym,Garage,Garden',
            ]);
        }
    }
}
