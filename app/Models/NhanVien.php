<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NhanVien extends Model
{
    use HasFactory;
    function listUser()
    {
        return $data = DB::table('nhan_viens')
            ->join('phong_bans', 'phong_bans.id', '=', 'nhan_viens.id_phong_ban')
            ->join('chuc_vus', 'chuc_vus.id', 'nhan_viens.id_chuc_vus')
            ->select('nhan_viens.*', 'phong_bans.ten_phong_ban', 'chuc_vus.ten_chuc_vu')
            ->orderBy('id')
            ->paginate(10);
    }
    function createUser($arr)
    {
        DB::table('nhan_viens')->insert($arr);
    }
    function getChucVu()
    {
        return DB::table('chuc_vus')->get();
    }
    function getPhongBan()
    {
        return DB::table('phong_bans')->get();
    }
    function showUser($id)
    {
        return $data = DB::table('nhan_viens')->where('id', $id)->get();
    }
    function updateUser($arr, $id)
    {
        DB::table('nhan_viens')->where('id', $id)
            ->update($arr);
    }
    function deleteUser($id)
    {
        return  DB::table('nhan_viens')->where('id', $id)->delete();
    }
    function phongBan()
    {
        return $this->belongsTo(PhongBan::class, 'id_phong_ban');
    }
    function chucVu()
    {
        return $this->belongsTo(ChucVu::class, 'id_chuc_vus');
    }
}
