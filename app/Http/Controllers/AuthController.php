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

    public function serviceCreate()
    {
        return view('formservice');
    }

    public function serviceView(Request $request)
    {
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

        $waktu_servis = $validated['tgl_servis'] . ' ' . $validated['jam'] . ':' . $validated['menit'] . ':00';

        try {
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