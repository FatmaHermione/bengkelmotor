<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Sparepart;


class KeranjangController extends Controller
{
public function show()
{
$cart = session()->get('cart', []);
return view('cart', compact('cart'));
}


public function add($id)
{
$product = Sparepart::findOrFail($id);
$cart = session()->get('cart', []);


if (isset($cart[$id])) {
$cart[$id]['qty']++;
} else {
$cart[$id] = [
'name' => $product->nama,
'price' => $product->harga,
'qty' => 1,
];
}


session()->put('cart', $cart);
return redirect()->back()->with('success', 'Ditambahkan ke keranjang!');
}


public function update(Request $request, $id)
{
$cart = session()->get('cart');
if (isset($cart[$id])) {
$cart[$id]['qty'] = $request->qty;
session()->put('cart', $cart);
}
return redirect()->route('cart.show');
}


public function remove($id)
{
$cart = session()->get('cart');
if (isset($cart[$id])) {
unset($cart[$id]);
session()->put('cart', $cart);
}
return redirect()->route('cart.show');
}}