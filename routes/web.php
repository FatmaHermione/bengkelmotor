<?php

use Illuminate\Support\Facades\Route;

// ================= CONTROLLERS =================
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarLayananController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\GearController;
use App\Http\Controllers\OliController;
use App\Http\Controllers\BanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BookingServisController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PaymentController;

// =================================================
// 1️⃣ ROUTE PUBLIK (BELUM LOGIN)
// =================================================
Route::get('/', fn () => redirect()->route('login.form'));

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =================================================
// 2️⃣ ROUTE USER (LOGIN WAJIB)
// =================================================
Route::middleware(['auth'])->group(function () {

    // ---- HOME ----
    Route::get('/home', fn () => view('home'))->name('home');

    // ---- PRODUK (READ ONLY) ----
    Route::get('/oli', [OliController::class, 'index'])->name('oli.index');
    Route::get('/ban', [BanController::class, 'index'])->name('ban.index');
    Route::get('/gear', [GearController::class, 'index'])->name('gear.index');
    Route::resource('sparepart', SparepartController::class)->only(['index']);

    // ---- PEGAWAI (READ ONLY) ----
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');

    // ---- LAYANAN (READ ONLY) ----
    Route::resource('daftar-layanan', DaftarLayananController::class)->only(['index']);

    // ---- KERANJANG ----
    Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

    // ---- BOOKING SERVIS ----
    Route::get('/service', [BookingServisController::class, 'create'])->name('service.form');
    Route::post('/service', [BookingServisController::class, 'store'])->name('service.store');
    Route::get('/riwayat-service', [BookingServisController::class, 'index'])->name('service.riwayat');

    // ---- PAYMENT ----
    Route::get('/payment/method', [PaymentController::class, 'paymentMethod'])->name('payment.method');
    Route::post('/payment/choose', [PaymentController::class, 'choosePaymentMethod'])->name('payment.choose');
    Route::get('/payment/qris', [PaymentController::class, 'qris'])->name('payment.qris');
    Route::get('/payment/transfer', [PaymentController::class, 'transfer'])->name('payment.transfer');
    Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');
    Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
});

// =================================================
// 3️⃣ ROUTE ADMIN (LOGIN + ADMIN)
// =================================================
Route::middleware(['auth', 'admin'])->group(function () {

    // ---- CRUD PEGAWAI (ADMIN FULL) ----
    Route::resource('pegawai', PegawaiController::class)->except(['index']);

    // ---- CRUD PRODUK UMUM ----
    Route::get('/produk/tambah', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{kategori}/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{kategori}/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{kategori}/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    // ---- PRODUK PER KATEGORI ----
    Route::post('/oli', [OliController::class, 'store'])->name('oli.store');
    Route::post('/ban', [BanController::class, 'store'])->name('ban.store');
    Route::post('/gear', [GearController::class, 'store'])->name('gear.store');

    // ---- UPDATE STATUS SERVIS ----
    Route::post('/riwayat-service/{id}', [BookingServisController::class, 'updateStatus'])
        ->name('service.update');

    // ---- CRUD LAYANAN ----
    Route::resource('daftar-layanan', DaftarLayananController::class)->except(['index']);
});

// =================================================
// 4️⃣ ROUTE LAIN-LAIN
// =================================================
Route::get('/about', fn () => view('about'))->name('about.index');
