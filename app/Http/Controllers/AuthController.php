<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

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
    Auth::logout(); // logout user
    $request->session()->invalidate(); // hapus session lama
    $request->session()->regenerateToken(); // buat token baru (aman)

    // arahkan ke halaman signup (atau login, terserah urutanmu)
    return redirect()->route('signup.form');
}

    public function showForm()
    {
        return view('signup'); // tampilkan halaman signup.blade.php
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
}
