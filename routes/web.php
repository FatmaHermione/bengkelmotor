<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarLayananController;
use App\Http\Controllers\SparepartController; // Controller Sparepart
use App\Http\Controllers\GearController;      // Controller Gear (Baru)
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\OliController; // <--- Tambah ini
use App\Http\Controllers\BanController; // <--- Tambah ini

// ===== HALAMAN UTAMA & AUTH =====
Route::get('/', function () {
    return redirect()->route('login.form');
});

// Login & Signup
Route::get('/signup', [AuthController::class, 'showForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'store'])->name('signup');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register (Mungkin duplikat dengan signup, pilih salah satu jika perlu)
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/home', fn() => view('home'))->name('home');


// ===== PRODUK (SPAREPART & GEAR TERPISAH) =====

// 1. SPAREPART (Pakai Resource Controller bawaan)
Route::resource('sparepart', SparepartController::class);

// 2. GEAR (Manual Route ke GearController)
// Menampilkan halaman gear (mengambil data dari database)
Route::get('/gear', [GearController::class, 'index'])->name('gear'); 
// Menyimpan data gear baru
Route::post('/gear/store', [GearController::class, 'store'])->name('gear.store');


// ===== KATEGORI LAIN (Oli & Ban) =====
// Jika belum ada controllernya, biarkan view saja dulu
// ===== OLI =====
Route::get('/oli', [OliController::class, 'index'])->name('oli');
Route::post('/oli/store', [OliController::class, 'store'])->name('oli.store');

// ===== BAN =====
Route::get('/ban', [BanController::class, 'index'])->name('ban');
Route::post('/ban/store', [BanController::class, 'store'])->name('ban.store');
// ===== PRODUK UMUM =====
// Produk Umum
// Menampilkan Form Tambah Produk
Route::get('/produk/tambah', [ProdukController::class, 'create'])->name('produk.create');

// Memproses Simpan Produk (Menuju Controller Polisi Lalu Lintas tadi)
Route::post('/produk/simpan', [ProdukController::class, 'store'])->name('produk.store');

// 1. Tampilkan Form Edit (Contoh URL: /produk/edit/oli/5)
Route::get('/produk/edit/{kategori}/{id}', [ProdukController::class, 'edit'])->name('produk.edit');

// 2. Proses Update Data
Route::put('/produk/update/{kategori}/{id}', [ProdukController::class, 'update'])->name('produk.update');

// 3. Proses Hapus Data
Route::delete('/produk/hapus/{kategori}/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

// ===== LAYANAN & PEGAWAI =====
Route::resource('daftar-layanan', DaftarLayananController::class);
Route::get('/service', fn() => view('service'))->name('service.form');
Route::get('/pegawai', fn() => view('pegawai'))->name('pegawai.index');
Route::get('/formservice', [AuthController::class, 'showFormService'])->name('formservice.form');
Route::post('/formservice/view', [AuthController::class, 'formService'])->name('formservice.view');


// ===== TRANSAKSI & PEMBAYARAN =====
// Pembayaran
Route::middleware('auth')->group(function () {
    Route::get('/payment', [AuthController::class, 'payment'])->name('payment');
    Route::post('/process-payment', [AuthController::class, 'processPayment'])->name('payment.process');
    Route::get('/payment-success', [AuthController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment-method', [AuthController::class, 'paymentMethod'])->name('payment.method');
    Route::post('/choose-payment-method', [AuthController::class, 'choosePaymentMethod'])->name('choose.payment.method');
});

// Keranjang Transaksi (Lama)
Route::post('/detail-transaksi/store', [KeranjangController::class, 'store'])->name('detail-transaksi.store');
Route::get('/pembayaran', [KeranjangController::class, 'pembayaran'])->name('pembayaran');

// Cart Session
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');