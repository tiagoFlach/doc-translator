<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(),
            'price' => floatval(rand(20, 1000) . '.' . rand(0, 99)),
            'file' => fake()->name(),
            'initial_language_id' => Language::inRandomOrder()->first()->id,
            'final_language_id' => Language::inRandomOrder()->first()->id,
        ];
    }
}
