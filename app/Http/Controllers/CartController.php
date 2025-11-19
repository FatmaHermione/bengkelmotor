<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $olis = [
            1 => ['id'=>1,'nama'=>'SHELL ADVANCE AX7 SCOOTER','harga'=>64000,'gambar'=>'img/oli1.png'],
            2 => ['id'=>2,'nama'=>'MOTUL GP POWER','harga'=>74000,'gambar'=>'img/oli2.png'],
            3 => ['id'=>3,'nama'=>'MOTUL SCOOTER POWER','harga'=>82000,'gambar'=>'img/oli3.png'],
            4 => ['id'=>4,'nama'=>'SHELL ADVANCE AX5','harga'=>46000,'gambar'=>'img/oli4.png'],
        ];

        $oli = $olis[$id];

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'id' => $oli['id'],
                'nama' => $oli['nama'],
                'harga' => $oli['harga'],
                'gambar' => $oli['gambar'],
                'qty' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Oli berhasil ditambahkan ke keranjang!');
    }

    public function remove(Request $request)
    {
        $id = $request->id;

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Produk berhasil dihapus.');
    }

    public function clear()
    {
        session()->forget('cart');
        return back()->with('success', 'Keranjang dikosongkan.');
    }
}
