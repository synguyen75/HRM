<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ChucVu;
use App\Models\Luong;
use App\Models\NhanVien;
use App\Models\TaiKhoan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(TaiKhoanSeeder::class);
        // $this->call(PhongBanSeeder::class);
        // $this->call(ChucVuSeeder::class);
        // $this->call(NhanVienSeeder::class);
        $this->call(LuongSeeder::class);
    }
}
