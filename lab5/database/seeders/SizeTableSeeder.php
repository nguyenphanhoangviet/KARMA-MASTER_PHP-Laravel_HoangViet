<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            '34-35', '35', '35-36', '36', '36-37', '37', 
            '37-38', '38', '38-39', '39', '39-40', '40', 
            '40-41', '41', '41-42', '42', '42-43'
        ];

        foreach ($sizes as $size) {
            Size::create(['name' => $size]);
        }
    }
}
