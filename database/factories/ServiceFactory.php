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
        $source = Language::inRandomOrder()->first();
        $target = Language::inRandomOrder()
            ->where('id', '!=', $source->id)
            ->first();

        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraphs(5, true),
            'price' => floatval(rand(20, 1000) . '.' . rand(0, 99)),
            'source_file' => null,
            'category_id' => Category::inRandomOrder()->first()->id,
            'source_language_id' => $source->id,
            'target_language_id' => $target->id,
        ];
    }

    public function fromEnglish(): static
    {
        $english = Language::where('code', 'en')->first();

        return $this->state(fn(array $attributes) => [
            'source_language_id' => $english->id,
        ]);
    }

    public function fromGerman(): static
    {
        $german = Language::where('code', 'de')->first();

        return $this->state(fn(array $attributes) => [
            'source_language_id' => $german->id,
        ]);
    }

    public function fromPortuguese(): static
    {
        $portuguese = Language::where('code', 'pt')->first();

        return $this->state(fn(array $attributes) => [
            'source_language_id' => $portuguese->id,
        ]);
    }

    public function toEnglish(): static
    {
        $english = Language::where('code', 'en')->first();

        return $this->state(fn(array $attributes) => [
            'target_language_id' => $english->id,
        ]);
    }

    public function toGerman(): static
    {
        $german = Language::where('code', 'de')->first();

        return $this->state(fn(array $attributes) => [
            'target_language_id' => $german->id,
        ]);
    }

    public function toPortuguese(): static
    {
        $portuguese = Language::where('code', 'pt')->first();

        return $this->state(fn(array $attributes) => [
            'target_language_id' => $portuguese->id,
        ]);
    }
}
