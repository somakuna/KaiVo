<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TourService>
 */
class TourServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->title(),
            'adults_price' => rand(1, 99),
            'children_price' => rand(1, 99),
            'infants_price' => rand(1, 99),
        ];
    }
}
