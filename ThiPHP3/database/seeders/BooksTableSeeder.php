<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'Sách 1',
            'price' => 100000,
            'image' => 'img/sach1.jpg',
            'publisher' => 'Nhà xuất bản A',
        ]);

        Book::create([
            'title' => 'Sách 2',
            'price' => 120000,
            'image' => 'img/sach2.jpg',
            'publisher' => 'Nhà xuất bản B',
        ]);

        Book::create([
            'title' => 'Sách 3',
            'price' => 95000,
            'image' => 'img/sach3.jpg',
            'publisher' => 'Nhà xuất bản C',
        ]);
    }
}
