<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tai_khoans')->insert([
            'ten_tai_khoan' => 'User', // Giá trị ví dụ
            'mat_khau' => Hash::make('password'), // Mã hóa mật khẩu
            'quyen_han' => 'User', // Giá trị ví dụ
            'trang_thai' => 1, // Giá trị ví dụ
            'email' => 'user@gmail.com', // Giá trị ví dụ
            'remember_token' => null, // Giá trị ví dụ
            'created_at' => Carbon::now(), // Thời gian hiện tại
            'updated_at' => Carbon::now(), // Thời gian hiện tại
        ]);
    }
}
