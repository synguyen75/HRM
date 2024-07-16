<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Automattic\Jetpack\Blaze\Dashboard;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LuongController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\KyLuatController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PhongBanController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\DashBroadController;
use App\Http\Controllers\KhenThuongController;
use App\Http\Controllers\NhomNhanVienController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('admin')->group(function () {
    Route::get('/', [NhanVienController::class, 'index'])->name('dashbroad');
    Route::resource('nhanvien', NhanVienController::class);
    Route::resource('chucvu', ChucVuController::class);
    Route::resource('khenthuong', KhenThuongController::class);
    Route::resource('kyluat', KyLuatController::class);
    Route::resource('nhom', NhomNhanVienController::class);
    Route::resource('phongban', PhongBanController::class);
    Route::resource('taikhoan', TaiKhoanController::class);
    Route::get('luong/{id}', [LuongController::class, 'index'])->name('luong.get');
    Route::get('luong/create/{id}', [LuongController::class, 'create'])->name('luong.up');
    Route::resource('luong', LuongController::class);
});

Route::post('login', [AuthController::class, 'login']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
