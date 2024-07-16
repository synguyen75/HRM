<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class LuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $nhanVienIds = DB::table('nhan_viens')->pluck('id')->toArray(); // Lấy danh sách ID của nhân viên

        $data = [];
        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'id_nhan_vien' => $faker->randomElement($nhanVienIds),
                'muc_luong_theo_ngay' => $faker->randomFloat(2, 100, 1000), // Giá trị từ 100 đến 1000
                'muc_luong' => $faker->randomFloat(2, 1000, 10000), // Giá trị từ 1000 đến 10000
                'ngay_cong' => $faker->numberBetween(20, 31), // Giá trị từ 20 đến 31
                'ngay_hieu_luc' => $faker->date,
            ];
        }

        DB::table('luongs')->insert($data);
    }
}
