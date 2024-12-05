<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'role:work_task'])->group(function () {

    Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
    Route::post('/upload_file', [TaskController::class, 'uploadFile'])->name('uploadFile');
});

Route::get('/', function () {
    if (auth()->user()->hasRole('writer_task')) {
        return redirect()->route('task.index');
    } elseif (auth()->user()->hasRole('work_task')) {
        return redirect()->route('dashboard');
    }
})->middleware('auth');

Route::middleware(['auth', 'role:writer_task'])->group(function () {

    Route::get('/download/{file}', [TaskController::class, 'downloadFile'])->name('download.file');

    Route::get('admin-dashboard', [UserController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::resource('task',     TaskController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
