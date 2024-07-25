<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class ResetpassController extends Controller
{
    protected $redirectTo = '/home';

    public function showResetForm($token, Request $request)
    {
        $email = $request->email;
        return view('auth.passwords.reset', ['token' => $token, 'email' => $email]);
    }

    public function reset(Request $request)
    {
        $request->validate(
            [
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8|confirmed',
            ],
            [
                'password.min' => 'Mật khẩu yêu cầu ít nhất 8 ký tự',
                'password.confirmed' => 'Mật khẩu xác thực không đúng'
            ]
        );
        // dd($request);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'mat_khau' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Đổi mật khẩu thành công')
            : back()->withErrors(['email' => [__($status)]]);
    }
}
