<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\RegisterService;

class RegisterController extends Controller
{
    protected RegisterService $registerService;
    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function register(RegisterRequest $request)
    {
        $this->registerService->register($request->validated());

        return redirect()->route('dashboard')->with('success', 'Compte créé avec succès, en attente de validation.');
    }
}
