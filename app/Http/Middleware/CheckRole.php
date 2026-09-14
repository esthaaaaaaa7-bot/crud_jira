<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = session('user');

        if (!$user) {
            return redirect('/login');
        }

        if (!in_array($user->id_jabatan, [1])) {
            return redirect('/dashboard')->with('error', 'Akses ditolak! Hanya Administrator yang dapat mengakses halaman ini.');
        }

        return $next($request);
    }
}
