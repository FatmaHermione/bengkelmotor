<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarLayananController;

// Route default Laravel
Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::get('/test-env', function () {
    dd(env('DB_CONNECTION'));
});
=======
// Route daftar layanan
Route::get('/daftar-layanan', [DaftarLayananController::class, 'index'])->name('daftar-layanan.index');
Route::get('/daftar-layanan/create', [DaftarLayananController::class, 'create'])->name('daftar-layanan.create');
Route::post('/daftar-layanan', [DaftarLayananController::class, 'store'])->name('daftar-layanan.store');
Route::delete('/daftar-layanan/{id}', [DaftarLayananController::class, 'destroy'])->name('daftar-layanan.destroy');
>>>>>>> e6f327a9a164c6e0f663da7f7993d837d672acd6
