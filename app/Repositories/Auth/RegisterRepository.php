<?php

namespace App\Repositories\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterRepository
{
    public function createUser(array $data): User
    {
        $photoPath = isset($data['photo']) ? $data['photo']->store('photos', 'public') : null;

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'statut' => 'pending',
            'photo' => $photoPath,
        ]);
    }
}
