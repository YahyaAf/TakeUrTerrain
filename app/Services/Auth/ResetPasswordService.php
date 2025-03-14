<?php

namespace App\Services\Auth;

use App\Repositories\Auth\ResetPasswordRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ResetPasswordService
{
    protected ResetPasswordRepository $resetPasswordRepository;

    public function __construct(ResetPasswordRepository $resetPasswordRepository)
    {
        $this->resetPasswordRepository = $resetPasswordRepository;
    }

    public function resetPassword(array $credentials): string
    {
        return $this->resetPasswordRepository->resetPassword($credentials, function ($user, $password) {
            $user->forceFill(['password' => Hash::make($password)])->save();
        });
    }
}
