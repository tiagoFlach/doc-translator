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
            CategorySeeder::class,
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
            'role_id' => Role::getAdminId(),
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'password' => bcrypt('123'),
        ]);

        $translator = User::create([
            'role_id' => Role::getTranslatorId(),
            'name' => 'Tradutor',
            'email' => 'tradutor@email.com',
            'password' => bcrypt('123'),
        ]);        

        $client = User::factory([
                'role_id' => Role::getClientId(),
                'name' => 'Cliente',
                'email' => 'cliente@email.com',
                'password' => bcrypt('123'),
            ])
            ->hasServices(5)
            ->create();

        // $client->hasServices(3)
        //     ->create();
    }
}
