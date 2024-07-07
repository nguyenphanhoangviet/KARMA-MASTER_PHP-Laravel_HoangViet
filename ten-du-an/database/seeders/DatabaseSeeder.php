<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SanPham;
use App\Models\Loai;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Kiểm tra xem người dùng với email 'test@example.com' đã tồn tại hay chưa
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        Loai::create(["ten_loai" => "Asus", "thu_tu" => "1", "an_hien" => "1"]);
        Loai::create(["ten_loai" => "Acer", "thu_tu" => "2", "an_hien" => "1"]);
        Loai::create(["ten_loai" => "Lenovo", "thu_tu" => "3", "an_hien" => "1"]);
        Loai::create(["ten_loai" => "MSI", "thu_tu" => "4", "an_hien" => "1"]);
        
        $sp_arr = [
            ["ten_sp" => "Asus TUF Gaming 7535HS", "gia" => 18490000, "id_loai" => "1"],
            ["ten_sp" => "Acer Gaming Aspire A15", "gia" => 16990000, "id_loai" => "2"],
            ["ten_sp" => "MSI Gaming GF63 12450H", "gia" => 16990000, "id_loai" => "4"],
            ["ten_sp" => "Lenovo Ideapad 5500H", "gia" => 15990000, "id_loai" => "3"],
            ["ten_sp" => "Acer Gaming Nitro i7", "gia" => 21990000, "id_loai" => "2"],
            ["ten_sp" => "Asus Gaming R5 7535HS", "gia" => 19290000, "id_loai" => "1"],
            ["ten_sp" => "Asus Air 13 M3", "gia" => 38490000, "id_loai" => "1"],
            ["ten_sp" => "Asus fq5229TU i3 215U", "gia" => 10790000, "id_loai" => "1"],
            ["ten_sp" => "Acer Aspire 51M i5", "gia" => 11490000, "id_loai" => "2"],
            ["ten_sp" => "MSI Gaming Thin 12450H", "gia" => 16990000, "id_loai" => "4"],
            ["ten_sp" => "MSI GF63 12UCX i5", "gia" => 17290000, "id_loai" => "4"],
            ["ten_sp" => "MSI Sword HX B14VFKG", "gia" => 37990000, "id_loai" => "4"],
            ["ten_sp" => "MSI HX B14VFKG i7 14700HX", "gia" => 36590000, "id_loai" => "4"],
            ["ten_sp" => "Lenovo LOQ i5 12450HX", "gia" => 21490000, "id_loai" => "3"],
            ["ten_sp" => "Lenovo Gaming 15IAX9 i5", "gia" => 20790000, "id_loai" => "3"],
        ];

        foreach ($sp_arr as $sp) {
            SanPham::create($sp);
        }
    }
}
