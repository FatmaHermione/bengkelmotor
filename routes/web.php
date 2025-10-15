<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarLayananController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login.form');
});

// Route test environment (punya kamu)
Route::get('/test-env', function () {
    dd(env('DB_CONNECTION'));
});

// Route daftar layanan (dari remote)
Route::get('/daftar-layanan', [DaftarLayananController::class, 'index'])->name('daftar-layanan.index');
Route::get('/daftar-layanan/create', [DaftarLayananController::class, 'create'])->name('daftar-layanan.create');
Route::post('/daftar-layanan', [DaftarLayananController::class, 'store'])->name('daftar-layanan.store');
Route::delete('/daftar-layanan/{id}', [DaftarLayananController::class, 'destroy'])->name('daftar-layanan.destroy');

// Route untuk Login dan Logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// TAMBAHKAN DUA ROUTE INI UNTUK REGISTRASI
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
