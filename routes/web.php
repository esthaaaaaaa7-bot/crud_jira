<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Middleware\CheckAuth;

// ─── Publik: hanya bisa diakses tanpa login ───────────────────────────────────
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

// Route Register (publik, tidak perlu login)
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);

// Protected: wajib login
Route::middleware([CheckAuth::class])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Projects
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    // Team
    Route::get('/team', function () {
        return view('team');
    })->name('team');

    // Settings
    Route::get('/setting', function () {
        return view('projects.settings');
    })->name('setting');
    Route::get('/settings', function () {
        return redirect('/setting');
    });

    // Board (Halaman pilih project sebelum membuka Kanban board)
    Route::get('/board', [ProjectController::class, 'boardSelect'])->name('board.select');
    Route::get('/boards', function () {
        return redirect('/board');
    });
    Route::get('/task-log', function () {
        return view('TaskLog');
    })->name('task.log');
});
