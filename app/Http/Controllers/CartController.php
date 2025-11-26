<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $product = [
            'id'    => $id,
            'nama'  => $request->nama,
            'harga' => $request->harga,
            'qty'   => 1
        ];

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = $product;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.show')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['qty'] = $request->qty;
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Jumlah di keranjang diperbarui.');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Produk dihapus dari keranjang.');
    }

    public function clear()
    {
        session()->forget('cart');
        return back()->with('success', 'Keranjang dikosongkan.');
    }
}
