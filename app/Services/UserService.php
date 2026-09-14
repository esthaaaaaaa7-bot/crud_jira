<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    // Fungsi ini murni hanya memikirkan logika database
    public function updateUser(User $user, array $validatedData)
    {
        $data = [
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
        ];

        if (!empty($validatedData['password'])) {
            $data['password'] = Hash::make($validatedData['password']);
        }

        return $user->update($data);
    }

    public function createUser(array $validatedData)
    {
        $validatedData['password'] = Hash::make($validatedData['password']);
        return User::create($validatedData);
    }

    public function destroyUser(User $user, int $loggedInUserId)
    {
        if ($loggedInUserId == $user->id) {
            return false;
        }
        return $user->delete();
    }
}