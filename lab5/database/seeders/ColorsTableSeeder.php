<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ColorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('colors')->insert([
            [
                'id' => 2,
                'name' => 'Da',
                'hex_code' => '#dfd6ba',
                'created_at' => Carbon::create('2024', '06', '23', '07', '26', '09'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '10', '00')
            ],
            [
                'id' => 3,
                'name' => 'Trắng',
                'hex_code' => '#d8d0cd',
                'created_at' => Carbon::create('2024', '06', '23', '07', '34', '34'),
                'updated_at' => Carbon::create('2024', '06', '23', '07', '34', '34')
            ],
            [
                'id' => 4,
                'name' => 'Tím',
                'hex_code' => '#86789c',
                'created_at' => Carbon::create('2024', '06', '23', '07', '39', '06'),
                'updated_at' => Carbon::create('2024', '06', '23', '07', '39', '44')
            ],
            [
                'id' => 5,
                'name' => 'Xanh Lá',
                'hex_code' => '#003c3b',
                'created_at' => Carbon::create('2024', '06', '23', '07', '41', '31'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '09', '42')
            ],
            [
                'id' => 6,
                'name' => 'Đỏ',
                'hex_code' => '#9a0013',
                'created_at' => Carbon::create('2024', '06', '23', '07', '43', '58'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '09', '51')
            ],
            [
                'id' => 7,
                'name' => 'Xanh Dương',
                'hex_code' => '#2395d0',
                'created_at' => Carbon::create('2024', '06', '23', '07', '55', '19'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '09', '31')
            ],
            [
                'id' => 8,
                'name' => 'Nâu',
                'hex_code' => '#42322e',
                'created_at' => Carbon::create('2024', '06', '23', '08', '01', '29'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '09', '23')
            ],
            [
                'id' => 9,
                'name' => 'Cam',
                'hex_code' => '#e13f50',
                'created_at' => Carbon::create('2024', '06', '23', '08', '10', '59'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '10', '59')
            ],
            [
                'id' => 10,
                'name' => 'Hồng',
                'hex_code' => '#e13f50',
                'created_at' => Carbon::create('2024', '06', '23', '08', '30', '53'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '30', '53')
            ],
            [
                'id' => 11,
                'name' => 'Vàng',
                'hex_code' => '#faba3a',
                'created_at' => Carbon::create('2024', '06', '23', '08', '35', '19'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '35', '19')
            ],
        ]);
    }
}
