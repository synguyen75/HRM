<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PhongBanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('phong_bans')->insert(
            [
                [
                    'ten_phong_ban' => "Phòng kế toán"
                ],
                [
                    'ten_phong_ban' => "Phòng nhân sự"
                ],
                [
                    'ten_phong_ban' => "Phòng IT"
                ]
            ]
        );
    }
}
