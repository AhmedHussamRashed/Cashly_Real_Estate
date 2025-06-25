<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Listing;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $buyers = User::inRandomOrder()->take(5)->get();
        $listings = Listing::where('status', 'available')->take(5)->get();

        foreach ($buyers as $index => $buyer) {
            $listing = $listings[$index];

            Transaction::create([
                'buyer_id' => $buyer->id,
                'listing_id' => $listing->id,
                'price' => $listing->price,
                'transaction_date' => now()->subDays(rand(1, 30))->format('Y-m-d'),
            ]);

            // update listing status
            $listing->update(['status' => 'sold']);
        }
    }
}
