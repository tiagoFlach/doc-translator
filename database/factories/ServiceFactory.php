<?php

namespace Database\Factories;

use App\Models\Category;
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
            'description' => fake()->paragraphs(5, true),
            'price' => floatval(rand(20, 1000) . '.' . rand(0, 99)),
            'file' => null,
            'category_id' => Category::inRandomOrder()->first()->id,
            'source_language_id' => Language::inRandomOrder()->first()->id,
            'target_language_id' => Language::inRandomOrder()->first()->id,
        ];
    }
}
