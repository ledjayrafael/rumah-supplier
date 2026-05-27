<?php

namespace Database\Factories;

use App\Models\SupplyOffer;
use App\Models\SupplyRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SupplyOffer>
 */
class SupplyOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'supply_request_id' => SupplyRequest::factory(),
            'supplier_name' => fake()->name(),
            'company_name' => fake()->company(),
            'price_per_unit' => fake()->randomFloat(2, 5000, 50000),
            'available_quantity' => fake()->randomFloat(2, 10, 500),
            'quality_grade' => fake()->randomElement(['Premium', 'Grade A', 'Grade B']),
            'lead_time_days' => fake()->numberBetween(0, 14),
            'message' => fake()->sentence(),
            'supplier_verified' => fake()->boolean(),
        ];
    }
}
