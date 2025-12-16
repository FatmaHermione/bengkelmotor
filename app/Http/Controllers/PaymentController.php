<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // =========================
    // PILIH METODE PEMBAYARAN
    // =========================
    public function paymentMethod()
    {
        $total = session('checkout_total', 0);
        $items = session('checkout_items', []);

        if ($total == 0 || empty($items)) {
            return redirect()->route('cart.show');
        }

        return view('payment_method', compact('items', 'total'));
    }

    public function choosePaymentMethod(Request $request)
    {
        $request->validate([
            'method' => 'required|string'
        ]);

        session(['payment_method' => $request->method]);

        switch ($request->method) {
            case 'qris':
                return redirect()->route('payment.qris');

            case 'transfer':
                return redirect()->route('payment.transfer');

            case 'cash':
                return redirect()->route('payment');

            default:
                return back();
        }
    }

    // =========================
    // QRIS
    // =========================
    public function qris()
    {
        $total = session('checkout_total', 0);

        if ($total == 0) {
            return redirect()->route('cart.show');
        }

        return view('qris', compact('total'));
    }

    // =========================
    // TRANSFER BANK
    // =========================
    public function transfer()
    {
        $total = session('checkout_total', 0);

        if ($total == 0) {
            return redirect()->route('cart.show');
        }

        return view('transfer', compact('total'));

    }
}
