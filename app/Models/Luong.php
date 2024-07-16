<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luong extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_nhan_vien',
        'muc_luong_theo_ngay',
        'ngay_cong',
        'muc_luong',
        'ngay_hieu_luc'
    ];
}
