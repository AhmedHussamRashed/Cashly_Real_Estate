<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Listing;
use App\Models\Agent;

class ListingSeeder extends Seeder
{
    public function run(): void
    {
        $agents = Agent::all();

        foreach ($agents as $agent) {
            for ($i = 1; $i <= 3; $i++) {
                Listing::create([
                    'agent_id' => $agent->id,
                    'title' => "Property $i by Agent {$agent->id}",
                    'description' => "Spacious house number $i with modern design.",
                    'price' => rand(50000, 250000),
                    'address' => "Area $i, City",
                    'status' => 'available',
                    'type' => 'sale',
                ]);
            }
        }
    }
}
