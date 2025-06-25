<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agent;
use App\Models\User;
use App\Models\Agency;
use Illuminate\Support\Str;

class AgentSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->take(5)->get();
        $agencies = Agency::pluck('id');

        foreach ($users as $index => $user) {
            Agent::create([
                'user_id' => $user->id,
                'agency_id' => $agencies[$index % $agencies->count()],
                'license' => 'LIC-' . strtoupper(Str::random(6)),
            ]);
        }
    }
}
