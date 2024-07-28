<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KyLuat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_nhan_vien',
        'id_nguoi_thuc_hien',
        'noi_dung',
        'ngay_ky_luat'
    ];
    function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'id_nhan_vien');
    }
    function nguoiKyLuat()
    {
        return $this->belongsTo(NhanVien::class, 'id_nguoi_thuc_hien');
    }
}
