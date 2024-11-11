<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'birthdate' => fake()->date,
            'email' => fake()->unique()->safeEmail,
            'email_verified_at' => fake()->unique()->safeEmail,
            'password' => Hash::make('password'),//contraseña por defecto
            'phone' => fake()->phoneNumber,
            'social_network' => fake()->url,
            'address' => fake()->address,
            'picture' => 'https://via.placeholder.com/150', // URL de imagen de ejemplo
            'status' => fake()->boolean,
        ];
    }

}
