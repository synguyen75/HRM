<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Notifications\Notifiable;

class TaiKhoan extends Authenticate
{
    use Notifiable;
    protected $table = 'tai_khoans';
    protected $fillable = [
        'ten_tai_khoan', 'mat_khau',
    ];
    protected $hidden = [
        'mat_khau', 'remember_token',
    ];
    public function getAuthPassword()
    {
        return $this->mat_khau;
    }
    // public function getAuthIdentifierName()
    // {
    //     return 'ten_tai_khoan';
    // }
}
