<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarLayananController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login.form');
});

// LOGIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// SIGN UP
Route::get('/signup', [AuthController::class, 'showForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'store'])->name('signup');

// DAFTAR LAYANAN
Route::get('/daftar-layanan', [DaftarLayananController::class, 'index'])->name('daftar-layanan.index');
Route::get('/daftar-layanan/create', [DaftarLayananController::class, 'create'])->name('daftar-layanan.create');
Route::post('/daftar-layanan', [DaftarLayananController::class, 'store'])->name('daftar-layanan.store');
Route::delete('/daftar-layanan/{id}', [DaftarLayananController::class, 'destroy'])->name('daftar-layanan.destroy');