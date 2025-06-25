<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@cashly.com',
            'password' => Hash::make('password'),
            'address' => 'Cairo, Egypt',
            'birthdate' => '1990-01-01',
            'balance' => 100000,
            'role' => 'admin',
            'image' => 'users/default.png',
        ]);

        // Agent User
        User::create([
            'name' => 'Agent User',
            'email' => 'agent@cashly.com',
            'password' => Hash::make('password'),
            'address' => 'Cairo, Egypt',
            'birthdate' => '1985-05-10',
            'balance' => 5000,
            'role' => 'agent',
            'image' => 'users/agent.png',
        ]);

        // Normal User
        User::create([
            'name' => 'Normal User',
            'email' => 'user@cashly.com',
            'password' => Hash::make('password'),
            'address' => 'Alexandria, Egypt',
            'birthdate' => '1995-06-15',
            'balance' => 3000,
            'role' => 'user',
            'image' => 'users/default.png',
        ]);

        // Additional Normal Users
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => "User $i",
                'email' => "user$i@cashly.com",
                'password' => Hash::make('password'),
                'address' => "City $i, Country $i",
                'birthdate' => now()->subYears(rand(20, 40))->format('Y-m-d'),
                'balance' => rand(1000, 10000),
                'role' => 'user',
                'image' => "users/user$i.png",
            ]);
        }
    }
}
