<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarLayananController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProdukController;

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

Route::get('/payment', [AuthController::class, 'payment'])->name('payment')->middleware('auth');
Route::post('/process-payment', [AuthController::class, 'processPayment'])->name('payment.process')->middleware('auth');
Route::get('/payment-success', [AuthController::class, 'paymentSuccess'])->name('payment.success')->middleware('auth');
Route::get('/payment-method', [AuthController::class, 'paymentMethod'])->name('payment.method')->middleware('auth');
Route::post('/choose-payment-method', [AuthController::class, 'choosePaymentMethod'])->name('choose.payment.method')->middleware('auth');


Route::get('/oli', function () {
    return view('oli');
})->name('oli');

Route::get('/gear', function () {
    return view('gear');
})->name('gear');

Route::get('/ban', function () {
    return view('ban');
})->name('ban');

Route::resource('sparepart', SparepartController::class);

Route::get('/produk/tambah', [ProdukController::class, 'create'])->name('produk.create');
Route::resource('produk', ProdukController::class)->except(['create']);

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/service', function () {
    return view('service');
})->name('service.form');

Route::get('/pegawai', function () {
    return view('pegawai');
})->name('pegawai.index');

Route::get('/oli', fn() => view('oli'))->name('oli');
Route::get('/gear', fn() => view('gear'))->name('gear');
Route::get('/ban', fn() => view('ban'))->name('ban');

Route::resource('sparepart', SparepartController::class);

Route::get('/home', fn() => view('home'))->name('home');

Route::get('/service', fn() => view('service'))->name('service.form');
Route::get('/pegawai', fn() => view('pegawai'))->name('pegawai.index');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/formservice', [AuthController::class, 'showFormService'])->name('formservice.form');
Route::post('/formservice/view', [AuthController::class, 'formService'])->name('formservice.view');

// Keranjang Transaksi (yang lama)
Route::post('/detail-transaksi/store', [KeranjangController::class, 'store'])->name('detail-transaksi.store');
Route::get('/pembayaran', [KeranjangController::class, 'pembayaran'])->name('pembayaran');

// Cart (session)
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');