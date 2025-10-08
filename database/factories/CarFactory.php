<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand' => fake()->randomElement(['Toyota', 'Honda', 'BMW', 'Hyundai', 'Ford']),
            'model' => fake()->word(),
            'year' => fake()->numberBetween(2000, date('Y')),
            'price' => fake()->numberBetween(3000, 40000),
            'mileage' => fake()->numberBetween(1000, 200000),
            'fuel_type' => fake()->randomElement(['petrol', 'diesel', 'electric', 'hybrid']),
            'transmission' => fake()->randomElement(['manual', 'automatic']),
            'condition' => fake()->randomElement(['new', 'used']),
            'description' => fake()->optional()->sentence(),
        ];
    }
}
