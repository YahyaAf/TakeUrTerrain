<?php

namespace App\Services\Auth;

use App\Repositories\Auth\LoginRepository;

class LoginService
{
    protected LoginRepository $loginRepository;

    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function login(array $credentials): bool
    {
        return $this->loginRepository->login($credentials);
    }

    public function logout(): void
    {
        $this->loginRepository->logout();
    }
}
