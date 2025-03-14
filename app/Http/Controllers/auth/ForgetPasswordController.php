<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgetPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('auth.forget-password');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        \Log::info("Email envoyé pour: " . $request->email); 

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

}

