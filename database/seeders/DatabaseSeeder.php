<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
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
            ->translator()
            ->language()
            ->create();
            
        User::factory(100)
            ->client()
            ->hasServices(3)
            ->create();

        $admin = User::create([
            'role_id' => Role::ADMIN,
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'password' => bcrypt('123456'),
        ]);

        $translator = User::create([
            'role_id' => Role::TRANSLATOR,
            'name' => 'Tradutor',
            'email' => 'tradutor@email.com',
            'password' => bcrypt('123456'),
        ]);        

        $client = User::factory([
                'role_id' => Role::CLIENT,
                'name' => 'Cliente',
                'email' => 'cliente@email.com',
                'password' => bcrypt('123456'),
            ])
            ->hasServices(5)
            ->create();

        // $client->hasServices(3)
        //     ->create();
    }
}
