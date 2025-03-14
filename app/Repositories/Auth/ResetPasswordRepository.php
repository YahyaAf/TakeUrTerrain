<?php

namespace App\Repositories\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class ResetPasswordRepository
{
    public function resetPassword(array $credentials, callable $callback): string
    {
        return Password::reset($credentials, $callback);
    }
}
