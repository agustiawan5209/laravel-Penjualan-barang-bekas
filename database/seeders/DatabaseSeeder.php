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
                'name' => 'Admin',
                'email' => 'Admin@gmail.com',
                'password' => '$2y$10$KEDhGdPP5J035czJ6jUMouuYqqhjzMmHz0qDn3qlTRRQOTg9H8sUS',
                'role_id' => 'SuperAdmin',

            ],[
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => '$2y$10$KEDhGdPP5J035czJ6jUMouuYqqhjzMmHz0qDn3qlTRRQOTg9H8sUS',
                'role_id' => 'Customer',
            ]
        ]);
        \App\Models\Category::insert([
            ['kategory' => 'Alat Elektronik',],
            ['kategory' => 'Peralatan Rumah Tangga',],
            ['kategory' => 'Komputer Dan Laptop',],
            ['kategory' => 'Alat Tulis Kantor',],
            ['kategory' => 'Kendaraan'],
            ['kategory' => 'Hobi & olahraga'],
        ]);
        \App\Models\Barang::insert([
            'user_id' => '1',
            'foto_produk' => '11d4d588fcb7b7f237734603c7078d3c.jpg',
            'nama_produk' => 'Kemeja',
            'harga' => '30000',
            'deskripsi' => 'Kemeja Islami',
            'stock' => '1',
            'categories' => '6',
        ]);
        \App\Models\Promo::insert([
            'kode_promo' => 'Promo-121',
            'category_id' => '1',
            'max_user' => '11',
            'use_user' => '0',
            'promo_persen' => '10',
            'promo_nominal' => null,
            'tgl_mulai' => '2022-08-09',
            'tgl_kadaluarsa' => '2022-08-27',
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
