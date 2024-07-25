<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanhVien extends Model
{
    use HasFactory;
    protected $fillable = [
        'nhom_nhan_vien_id',
        'phan_viec',
        'nhan_vien_id'
    ];
    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class);
    }
}
