<?php

namespace App\Services\Auth;

use App\Repositories\Auth\RegisterRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterService
{
    protected RegisterRepository $registerRepository;

    public function __construct(RegisterRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    public function register(array $data): User
    {
        $user = $this->registerRepository->createUser($data);
        Auth::login($user);
        return $user;
    }
}
