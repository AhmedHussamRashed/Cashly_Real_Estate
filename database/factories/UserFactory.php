<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory {
    public function definition(): array {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'birthdate' => $this->faker->date(),
            'role' => $this->faker->randomElement(['admin', 'agent', 'user']),
            'balance' => $this->faker->randomFloat(2, 0, 10000),
            'profile_image' => 'users/default.png',
            'remember_token' => Str::random(10),
        ];
    }
}

