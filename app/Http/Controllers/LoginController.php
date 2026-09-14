<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(LoginRequest $request, AuthService $authService)
    {
        $validated = $request->validated();
        $user = $authService->verifyLogin($validated);

        if ($user) {
            // Simpan data user ke session
            $request->session()->put('user', $user);
            return redirect('/dashboard');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect('/login');
    }
}
