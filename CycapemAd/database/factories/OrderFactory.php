<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => fake()->numberBetween(1, 10),
            'user_id' => fake()->numberBetween(1, 10),
            'datetime' => fake()->dateTime,
            'total_amount' => fake()->randomNumber(2),
            'address' => fake()->address,
            'shipper_id' => fake()->numberBetween(1, 10),
            'status' => fake()->boolean,
        ];
    }
}
