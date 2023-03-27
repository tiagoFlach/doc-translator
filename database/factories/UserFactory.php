<?php

namespace Database\Factories;

use App\Models\Language;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function admin()
	{
		return $this->state(fn (array $attributes) => [
			'role_id' => Role::getAdminId()
		]);
	}

	public function translator()
	{
		return $this->state(fn (array $attributes) => [
			'role_id' => Role::getTranslatorId(),
		]);
	}

	public function client()
	{
		return $this->state(fn (array $attributes) => [
			'role_id' => Role::getClientId(),
		]);
	}

	public function language()
	{
		$german = Language::firstWhere('name', 'German')->id;
		$english = Language::firstWhere('name', 'English')->id;
		$portuguese = Language::firstWhere('name', 'Portuguese')->id;

		return $this->afterCreating(function (User $user) use ($english, $portuguese, $german) {
			$languages = Language::inRandomOrder()
				->limit(rand(1, 2))
				->pluck('id')
				->toArray();

			foreach ($languages as &$language) {
				$language = [
					'language_id' => $language,
					'level' => array_rand(array_flip(Language::LEVELS)),
				];
			}

			// Adiciona inglês com 50% de chance
			if (rand(0, 1) === 1) {
				$english = [
					'language_id' => $english,
					'level' => array_rand(array_flip(Language::LEVELS)),
				];
				array_push($languages, $english);
			}

			// Adiciona português com 50% de chance
			if (rand(0, 1) === 1) {
				$portuguese = [
					'language_id' => $portuguese,
					'level' => array_rand(array_flip(Language::LEVELS)),
				];
				array_push($languages, $portuguese);
			}

			// Adiciona alemão com 50% de chance
			if (rand(0, 1) === 1) {
				$german = [
					'language_id' => $german,
					'level' => array_rand(array_flip(Language::LEVELS)),
				];
				array_push($languages, $german);
			}

			$user->languages()->sync($languages);
		});
	}

	public function defaultLanguages()
	{
		$german = Language::firstWhere('name', 'German')->id;
		$english = Language::firstWhere('name', 'English')->id;
		$portuguese = Language::firstWhere('name', 'Portuguese')->id;

		return $this->afterCreating(function (User $user) use ($english, $portuguese, $german) {
			$user->languages()->sync([
				[
					'language_id' => $german,
					'level' => array_rand(array_flip(Language::LEVELS)),
				],
				[
					'language_id' => $english,
					'level' => array_rand(array_flip(Language::LEVELS)),
				],
				[
					'language_id' => $portuguese,
					'level' => array_rand(array_flip(Language::LEVELS)),
				],
			]);
		});
	}
}
