<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/board', function () {
    if (!session('user')) {
        return redirect('/login');
    }
    $firstProject = \App\Models\Project::first();
    if ($firstProject) {
        return redirect('/projects/' . $firstProject->id);
    }
    return view('board');
});

// Route Register (publik, tidak perlu login)
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);

// Group route untuk kelola jabatan dan user yang dilindungi Middleware CheckRole
Route::middleware([CheckRole::class])->group(function () {

    // Route untuk CRUD Users (kecuali create & store yang sudah didaftarkan di atas)
    Route::resource('users', UserController::class)->except(['show', 'create', 'store']);
});
