<?php

use Illuminate\Support\Facades\Route;

// Import Semua Controller
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarLayananController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\GearController;
use App\Http\Controllers\OliController;
use App\Http\Controllers\BanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BookingServisController;

// ==============================================================
// 1. ROUTE UMUM (Bisa diakses User Biasa & Admin)
// ==============================================================

// Redirect halaman awal ke login
Route::get('/', function () {
    return redirect()->route('login.form');
});

// Login & Signup (Tanpa Middleware Auth)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/signup', [AuthController::class, 'showForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'store'])->name('signup');

// Logout (Perlu Auth)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ==============================================================
// 2. ROUTE KHUSUS MEMBER (Harus Login Dulu)
// ==============================================================
Route::middleware(['auth'])->group(function () {

    // --- Home & Halaman Produk ---
    Route::get('/home', fn() => view('home'))->name('home');
    
    // Halaman Produk (Hanya Menampilkan)
    Route::get('/oli', [OliController::class, 'index'])->name('oli');
    Route::get('/ban', [BanController::class, 'index'])->name('ban');
    Route::get('/gear', [GearController::class, 'index'])->name('gear');
    Route::resource('sparepart', SparepartController::class)->only(['index']);

    // --- Fitur Keranjang Belanja (Cart) ---
    // Tombol Beli (Masuk Keranjang)
    Route::post('/detail-transaksi/store', [CartController::class, 'store'])->name('detail-transaksi.store');
    
    // Halaman Keranjang & Aksi
    Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

    // --- Fitur Booking Servis (Input User) ---
    Route::get('/service', [BookingServisController::class, 'create'])->name('service.form');
    Route::post('/service/store', [BookingServisController::class, 'store'])->name('service.store');
    Route::get('/riwayat-service', [BookingServisController::class, 'index'])->name('service.riwayat');
    
    // --- Fitur Pegawai & Layanan (Read Only) ---
    Route::get('/pegawai', fn() => view('pegawai'))->name('pegawai.index');
    Route::resource('daftar-layanan', DaftarLayananController::class)->only(['index']);
    
    // --- Pembayaran ---
    Route::get('/payment', [AuthController::class, 'payment'])->name('payment');
    Route::post('/process-payment', [AuthController::class, 'processPayment'])->name('payment.process');
    Route::get('/payment-success', [AuthController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment-method', [AuthController::class, 'paymentMethod'])->name('payment.method');
    Route::post('/choose-payment-method', [AuthController::class, 'choosePaymentMethod'])->name('choose.payment.method');
});


// ==============================================================
// 3. ROUTE KHUSUS ADMIN (Hanya Admin yang bisa akses)
// ==============================================================
// Pastikan Middleware 'admin' sudah didaftarkan di bootstrap/app.php
Route::middleware(['auth', 'admin'])->group(function () {

    // --- Manajemen Produk (Create, Update, Delete) ---
    
    // Tambah Produk Baru
    Route::get('/produk/tambah', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk/simpan', [ProdukController::class, 'store'])->name('produk.store');

    // Edit Produk (Dinamis berdasarkan kategori)
    Route::get('/produk/edit/{kategori}/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/update/{kategori}/{id}', [ProdukController::class, 'update'])->name('produk.update');

    // Hapus Produk
    Route::delete('/produk/hapus/{kategori}/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    // --- Manajemen Servis ---
    // Update Status Servis (Menandai selesai)
    Route::post('/riwayat-service/update/{id}', [BookingServisController::class, 'updateStatus'])->name('service.update');
    
    // --- Manajemen Layanan (Full Resource untuk Admin) ---
    Route::resource('daftar-layanan', DaftarLayananController::class)->except(['index']);
});
