<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $phongBanIds = [2, 3, 4]; // Giả sử có ít nhất 3 phòng ban
        $chucVuIds = [2, 3, 4]; // Giả sử có ít nhất 3 chức vụ

        $data = [];
        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'ho_ten' => $faker->name,
                'bang_cap' => $faker->randomElement(['THCS', 'THPT', 'Cao Đẳng', 'Đại Học', 'Thạc Sĩ']),
                'so_dien_thoai' => $faker->phoneNumber,
                'dia_chi' => $faker->address,
                'id_phong_ban' => $faker->randomElement($phongBanIds),
                'id_chuc_vus' => $faker->randomElement($chucVuIds),
                'trang_thai' => 1,
            ];
        }

        DB::table('nhan_viens')->insert($data);
    }
}
