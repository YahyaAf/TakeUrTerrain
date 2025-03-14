<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\ForgetPasswordService;

class ForgetPasswordController extends Controller
{
    protected ForgetPasswordService $forgetPasswordService;

    public function __construct(ForgetPasswordService $forgetPasswordService)
    {
        $this->forgetPasswordService = $forgetPasswordService;
    }

    public function showForgetPasswordForm()
    {
        return view('auth.forget-password');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        \Log::info("Email envoyé pour: " . $request->email);

        $status = $this->forgetPasswordService->sendResetLink($request->email);

        return $status === \Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
