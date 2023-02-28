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
            'name' => fake()->jobTitle(),
            'description' => fake()->paragraph(),
            'file' => fake()->name(),
            'price' => floatval(rand(20, 1000) . '.' . rand(0, 99)),
            'initial_language_id' => Language::inRandomOrder()->first()->id,
            'final_language_id' => Language::inRandomOrder()->first()->id,
            'translator_id' => null,
        ];
    }
}
