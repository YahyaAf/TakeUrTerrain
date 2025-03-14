<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\ResetPasswordService;

class ResetPasswordController extends Controller
{
    protected ResetPasswordService $resetPasswordService;

    public function __construct(ResetPasswordService $resetPasswordService)
    {
        $this->resetPasswordService = $resetPasswordService;
    }

    public function showResetPasswordForm($token, $email)
    {
        return view('auth.reset-password', ['token' => $token, 'email' => $email]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ]);

        $status = $this->resetPasswordService->resetPassword($request->only('email', 'password', 'password_confirmation', 'token'));

        return $status === \Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
