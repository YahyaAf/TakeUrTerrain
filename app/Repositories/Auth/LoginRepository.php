<?php

namespace App\Repositories\Auth;

use Illuminate\Support\Facades\Auth;

class LoginRepository
{
    public function login(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }

    public function logout(): void
    {
        Auth::logout();
    }
}
