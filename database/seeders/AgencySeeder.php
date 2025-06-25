<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agency;
use Illuminate\Support\Str;

class AgencySeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Agency::create([
                'name' => "Agency $i",
                'description' => "Leading real estate agency number $i",
                'address' => "City $i, Country $i",
                'phone' => "012345678$i",
                'email' => "agency$i@cashly.com",
                'logo' => "agencies/agency$i.png",
            ]);
        }
    }
}
