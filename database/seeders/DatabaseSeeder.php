<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::insert([
            [
                'name'=>'Admin',
                'email'=> 'Admin@gmail.com',
                'password'=> '$2y$10$KEDhGdPP5J035czJ6jUMouuYqqhjzMmHz0qDn3qlTRRQOTg9H8sUS',
                'role_id'=> 'SuperAdmin',

            ]
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
