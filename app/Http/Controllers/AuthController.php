<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // $credentials = ['ten_tai_khoan' => 'sy123', 'password' => 'password'];
        if (Auth::guard('tai_khoan')->attempt($credentials)) {
            return redirect()->route('dashbroad');
        }
        return redirect()->back()->with('errors', 'Email hoặc mật khẩu không đúng');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Đăng xuất thành công');
    }
}
