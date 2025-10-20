<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarLayananController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::get('/signup', [AuthController::class, 'showForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'store'])->name('signup');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/daftar-layanan', [DaftarLayananController::class, 'index'])->name('daftar-layanan.index');
Route::get('/daftar-layanan/create', [DaftarLayananController::class, 'create'])->name('daftar-layanan.create');
Route::post('/daftar-layanan', [DaftarLayananController::class, 'store'])->name('daftar-layanan.store');
Route::delete('/daftar-layanan/{id}', [DaftarLayananController::class, 'destroy'])->name('daftar-layanan.destroy');

Route::get('/oli', function () {
    return view('oli');
})->name('oli');

// Halaman Home
Route::get('/home', function () {
    return view('home');
})->name('home');

// Halaman Form Service
Route::get('/service', function () {
    return view('service');
})->name('service.form');

Route::get('/pegawai', function () {
    return view('pegawai');
})->name('pegawai.index');

// TAMBAHKAN DUA ROUTE INI UNTUK REGISTRASI
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');