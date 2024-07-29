<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('category')->insert([
            [
                'id' => 3,
                'name' => 'Giày bóng rổ',
                'created_at' => Carbon::create('2024', '06', '23', '07', '26', '29'),
                'updated_at' => Carbon::create('2024', '06', '23', '07', '26', '29')
            ],
            [
                'id' => 4,
                'name' => 'Giày dép',
                'created_at' => Carbon::create('2024', '06', '23', '07', '35', '00'),
                'updated_at' => Carbon::create('2024', '06', '23', '07', '35', '00')
            ],
            [
                'id' => 5,
                'name' => 'Giày nam',
                'created_at' => Carbon::create('2024', '06', '23', '07', '40', '46'),
                'updated_at' => Carbon::create('2024', '06', '23', '07', '40', '46')
            ],
            [
                'id' => 6,
                'name' => 'Giày chạy bộ',
                'created_at' => Carbon::create('2024', '06', '23', '08', '08', '58'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '08', '58')
            ],
            [
                'id' => 7,
                'name' => 'Giày tập luyện',
                'created_at' => Carbon::create('2024', '06', '23', '08', '29', '52'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '29', '52')
            ],
            [
                'id' => 8,
                'name' => 'Giày đánh golf',
                'created_at' => Carbon::create('2024', '06', '23', '08', '39', '31'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '39', '31')
            ]
        ]);
    }
}
