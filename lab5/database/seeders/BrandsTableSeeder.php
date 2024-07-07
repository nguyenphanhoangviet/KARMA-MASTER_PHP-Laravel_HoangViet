<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BrandsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('brands')->insert([
            [
                'id' => 4,
                'name' => 'Nike',
                'img' => '1719152645.png',
                'created_at' => Carbon::create('2024', '06', '23', '07', '24', '05'),
                'updated_at' => Carbon::create('2024', '06', '23', '07', '24', '05')
            ],
            [
                'id' => 5,
                'name' => 'Adidas',
                'img' => '1719152664.png',
                'created_at' => Carbon::create('2024', '06', '23', '07', '24', '24'),
                'updated_at' => Carbon::create('2024', '06', '23', '07', '24', '24')
            ]
        ]);
    }
}
