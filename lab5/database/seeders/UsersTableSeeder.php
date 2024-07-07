<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Delete all records from the users table
        DB::table('users')->delete();

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Nguyễn Phan Hoàng Việt',
                'email' => 'abc@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$mE/wvYlZU7iiDnUoGaZFzuV/xAX93Y6yXQZv/Q8PAhRgx9jGNaL.y',
                'role' => 'user',
                'remember_token' => null,
                'created_at' => Carbon::create('2024', '06', '22', '01', '49', '28'),
                'updated_at' => Carbon::create('2024', '06', '22', '01', '49', '28')
            ],
            [
                'id' => 2,
                'name' => 'Nguyễn Phan Hoàng Việt',
                'email' => 'viet.nguyenphanhoang@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$BKdGS6orrhETPmgm9hJK9.GvehcZSC8JHY81qMi2oj4PSDGBX.L7G',
                'role' => 'admin',
                'remember_token' => null,
                'created_at' => Carbon::create('2024', '06', '22', '02', '02', '59'),
                'updated_at' => Carbon::create('2024', '06', '22', '02', '02', '59')
            ],
        ]);
    }
}
