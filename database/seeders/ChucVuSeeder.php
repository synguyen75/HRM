<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChucVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chuc_vus')->insert([
            [
                'ten_chuc_vu' => "Trưởng phòng",
                'mo_ta' => 'Người điều hành phòng đó'
            ],
            [
                'ten_chuc_vu' => "Phó phòng",
                'mo_ta' => 'Người hỗ trợ cho trưởng phòng'
            ],
            [
                'ten_chuc_vu' => "Nhân viên",
                'mo_ta' => 'Người thức hiện các công việc do trưởng phòng và phó phòng giao'
            ]
            ]
        );
    }
}
