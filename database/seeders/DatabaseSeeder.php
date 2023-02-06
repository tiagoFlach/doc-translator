<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Language;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		$this->call([
			RoleSeeder::class,
			LanguageSeeder::class,
			// UserSeeder::class,
		]);
        // \App\Models\User::factory(10)->create();

		User::factory(10)
			->admin()
			->create();

		User::factory(20)
			->tradutor()
			->languages()
			->create();
			
		User::factory(100)
			->cliente()
			->create();

		$admin = User::create([
			'role_id' => Role::ADMIN,
			'name' => 'Administrador',
			'email' => 'admin@email.com',
			'password' => bcrypt('123456'),
		]);

		$tradutor = User::create([
			'role_id' => Role::TRADUTOR,
			'name' => 'Tradutor',
			'email' => 'tradutor@email.com',
			'password' => bcrypt('123456'),
		]);

		$cliente = User::create([
			'role_id' => Role::CLIENTE,
			'name' => 'Cliente',
			'email' => 'cliente@email.com',
			'password' => bcrypt('123456'),
		]);
    }
}
