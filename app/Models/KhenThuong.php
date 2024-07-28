<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhenThuong extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_nhan_vien',
        'id_nguoi_khen_thuong',
        'noi_dung',
        'ngay_khen_thuong'
    ];
    function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'id_nhan_vien');
    }
    function nguoiKhenThuong()
    {
        return $this->belongsTo(NhanVien::class, 'id_nguoi_khen_thuong');
    }
}
