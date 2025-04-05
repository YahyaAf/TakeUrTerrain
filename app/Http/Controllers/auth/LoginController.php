<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService;

class LoginController extends Controller
{
    protected LoginService $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login(LoginRequest $request)
    {
        if ($this->loginService->login([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->intended(route('home'))->with('success', 'You are logged in successfully!');
        }
        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }

    public function logout()
    {
        $this->loginService->logout();
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
}
