<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function verifyLogin(array $credentials)
    {
        // Cari usernya di database
        $user = User::where('username', $credentials['username'])->first();

        // Cek kecocokan password
        if ($user && Hash::check($credentials['password'], $user->password)) {
            return $user;
        }

        return false;
    }
}
