<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Listing;
use App\Models\Photo;

class PhotoSeeder extends Seeder
{
    public function run(): void
    {
        $listings = Listing::all();

        foreach ($listings as $listing) {
            for ($i = 1; $i <= 2; $i++) {
                Photo::create([
                    'listing_id' => $listing->id,
                    'path' => "listings/listing{$listing->id}_photo$i.jpg",
                ]);
            }
        }
    }
}
