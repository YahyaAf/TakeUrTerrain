<?php

namespace App\Repositories\Auth;

use Illuminate\Support\Facades\Password;

class ForgetPasswordRepository
{
    public function sendResetLink(string $email): string
    {
        return Password::sendResetLink(['email' => $email]);
    }
}
