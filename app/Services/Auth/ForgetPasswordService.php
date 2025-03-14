<?php

namespace App\Services\Auth;

use App\Repositories\Auth\ForgetPasswordRepository;

class ForgetPasswordService
{
    protected ForgetPasswordRepository $forgetPasswordRepository;

    public function __construct(ForgetPasswordRepository $forgetPasswordRepository)
    {
        $this->forgetPasswordRepository = $forgetPasswordRepository;
    }

    public function sendResetLink(string $email): string
    {
        return $this->forgetPasswordRepository->sendResetLink($email);
    }
}
