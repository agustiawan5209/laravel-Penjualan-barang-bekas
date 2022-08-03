<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesanChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::insert([
            ['kategory' => 'Elektronik',],
            ['kategory' => 'Pakaian Pria',],
            ['kategory' => 'Pakaian Wanita',],
            ['kategory' => 'Peralatan Rumah Tangga',],
            ['kategory' => 'Komputer Dan Laptop',],
            ['kategory' => 'Alat Tulis Kantor',],
        ]);
    }
}
