<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;

Route::middleware('auth')->group(function () {
    Route::get('/enrollment/{page}', [EnrollmentController::class, 'show'])->name('enrollment.show');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('/', function () {
    return view('login.login');
});

Route::get('/dashboard', function () {
    return view('enrollment.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/signup', function () {
    return view('login.signup');
});

require __DIR__ . '/auth.php';
