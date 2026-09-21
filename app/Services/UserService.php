<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    // Buat akun user baru (proses register)
    public function createUser(array $validatedData)
    {
        $validatedData['password'] = Hash::make($validatedData['password']);
        return User::create($validatedData);
    }
}