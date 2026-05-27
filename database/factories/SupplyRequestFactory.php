<?php

namespace Database\Factories;

use App\Models\SupplyRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SupplyRequest>
 */
class SupplyRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'requester_name' => fake()->name(),
            'business_name' => fake()->company(),
            'product_name' => fake()->randomElement(['Pisang Cavendish Segar', 'Bawang Merah', 'Cabai Rawit', 'Telur Ayam Negeri']),
            'quantity' => fake()->randomFloat(2, 10, 500),
            'unit' => fake()->randomElement(['kg', 'ikat', 'tray', 'dus']),
            'delivery_location' => fake()->city(),
            'needed_at' => fake()->dateTimeBetween('+1 day', '+30 days')->format('Y-m-d'),
            'notes' => fake()->sentence(),
            'status' => 'open',
        ];
    }
}
