<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    // Tampilkan form daftar akun baru
    public function create()
    {
        return view('users.form');
    }

    // Simpan akun baru (proses register)
    public function store(StoreUserRequest $request, UserService $userService)
    {
        $validated = $request->validated();
        $userService->createUser($validated);
        return redirect('/login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }
}