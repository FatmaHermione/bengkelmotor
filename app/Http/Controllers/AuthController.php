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
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('signup.form');
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
   
        $items = [
            [
                'nama' => 'MOTUL Oil Motor SCOOTER POWER LE',
                'detail' => '4T 5W40 - 0.8 Kendaraan Mesin Oil',
                'harga' => 82000,
                'qty' => 1,
                'image' => 'motul.png',
            ],
            [
                'nama' => 'FDR TL GENZI PRO Ring 14 Ban Motor',
                'detail' => 'Tubeless Accessories Motorcycle Rasio - 80/80-14',
                'harga' => 212000,
                'layanan' => 'Servis mesin',
                'biaya_layanan' => 14000,
                'qty' => 1,
                'image' => 'fdr.png',
            ],
        ];

        $total = collect($items)->sum(function ($item) {
            return ($item['harga'] * $item['qty']) + ($item['biaya_layanan'] ?? 0);
        });

        return view('payment', compact('items', 'total'));
    }

    public function processPayment(Request $request)
    {

        return redirect()->route('payment.success')->with('success', 'Pembayaran berhasil!');
    }

    public function paymentSuccess()
    {
        return view('payment-success');
    }

    // Tampilkan halaman metode pembayaran
public function paymentMethod()
{
    $paymentMethods = [
        [
            'id' => 'cash',
            'nama' => 'Cash Payment',
            'icon' => 'cash.png',
        ],
        [
            'id' => 'barcode',
            'nama' => 'Barcode Payment (QRIS)',
            'icon' => 'qris.png',
        ],
        [
            'id' => 'bank',
            'nama' => 'Bank Transfer (BCA)',
            'icon' => 'bca.png',
        ],
        [
            'id' => 'va',
            'nama' => 'Virtual Account',
            'icon' => 'va.png',
        ],
    ];

    $total = session('total', 0); // total dari halaman sebelumnya (jika disimpan)

    return view('payment-method', compact('paymentMethods', 'total'));
}

}
