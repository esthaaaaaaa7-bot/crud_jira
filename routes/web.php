<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use App\Http\Middleware\CheckAuth;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);

Route::middleware([CheckAuth::class])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    Route::post('/projects/{projectId}/tasks',  [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{id}',                   [TaskController::class, 'show'])->name('tasks.show');
    Route::put('/tasks/{id}',                   [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}',                [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::post('/tasks/{id}/status',           [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
    Route::post('/tasks/{id}/comments',         [TaskController::class, 'storeComment'])->name('tasks.storeComment');

    Route::get('/team',          [TeamController::class, 'index'])->name('team');
    Route::post('/teams',        [TeamController::class, 'store'])->name('teams.store');
    Route::put('/teams/{id}',    [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');

    Route::get('/setting', function () {
        return view('projects.settings');
    })->name('setting');
    Route::get('/settings', function () {
        return redirect('/setting');
    });

    Route::get('/board', [ProjectController::class, 'boardSelect'])->name('board.select');
    Route::get('/boards', function () {
        return redirect('/board');
    });
    Route::get('/task-log', function () {
        return view('TaskLog');
    })->name('task.log');
});
