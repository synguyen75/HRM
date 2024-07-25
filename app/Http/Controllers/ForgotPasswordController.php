<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{

    function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }
    function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:tai_khoans,email'], [
            'email.exists' => 'Email của bạn chưa đăng ký tài khoản'
        ]);

        // sử dụng nếu chưa cài đặt ở auth
        // $status = Password::broker('tai_khoans')->sendResetLink(
        //     $request->only('email')
        // );
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => "Gửi email thành công"])
            : back()->withErrors(['email' => __($status)]);
    }
}
