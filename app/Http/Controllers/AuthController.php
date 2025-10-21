<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// TAMBAHAN: Diperlukan untuk form servis
use App\Models\Servis; 
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    // ==============================
    // FITUR AUTENTIKASI (Login, Logout, Signup)
    // ==============================

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Diubah ke route login, karena signup.form mungkin tidak ada
        return redirect()->route('login'); 
    }

    public function showForm()
    {
        return view('signup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50|unique:users,username',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return back()->with('success', 'Akun berhasil dibuat!');
    }

    // ==============================
    // FITUR PAYMENT (Sudah ada)
    // ==============================
    public function payment()
    {
        // ... (kode payment Anda) ...
    }

    public function processPayment(Request $request)
    {
        // ... (kode payment Anda) ...
    }

    public function paymentSuccess()
    {
        // ... (kode payment Anda) ...
    }

    // ==============================
    // FITUR FORM SERVIS (Baru Ditambahkan)
    // ==============================

    /**
     * Menampilkan halaman form servis.
     * (Nama diubah menjadi serviceCreate agar tidak bentrok)
     */
    public function serviceCreate()
    {
        // Pastikan Anda punya view 'form-servis.blade.php'
        return view('formservice');
    }

    /**
     * Menyimpan data dari form servis ke database.
     * (Nama diubah menjadi serviceStore agar tidak bentrok dengan store signup)
     */
    public function serviceView(Request $request)
    {
        // 1. Validasi data yang masuk
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'nopol' => 'required|string|max:10',
            'tipe_motor' => 'required|string|max:50',
            'tgl_servis' => 'required|date',
            'jam' => 'required|string',
            'menit' => 'required|string',
            'keluhan' => 'nullable|string',
        ]);

        // 2. Gabungkan tanggal, jam, dan menit
        $waktu_servis = $validated['tgl_servis'] . ' ' . $validated['jam'] . ':' . $validated['menit'] . ':00';

        // 3. Simpan ke database
        try {
            // Pastikan Anda sudah membuat Model 'Servis'
            Servis::create([
                'nama' => $validated['nama'],
                'no_handphone' => $validated['no_hp'],
                'nomor_polisi' => $validated['nopol'],
                'tipe_motor' => $validated['tipe_motor'],
                'rencana_servis_at' => $waktu_servis,
                'keluhan' => $validated['keluhan'],
            ]);

        } catch (\Exception $e) {
            return Redirect::back()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }

        return redirect()->route('home')->with('success', 'Data servis berhasil dikirim!');
    }
}