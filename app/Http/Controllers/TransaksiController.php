<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// Import Model
use App\Models\Cart;
use App\Models\Oli;
use App\Models\Ban;
use App\Models\Gear;
use App\Models\Sparepart;

class CartController extends Controller
{
    // 1. TAMPILKAN KERANJANG (READ DATABASE -> SYNC TO SESSION)
    public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('login.form');
        }

        $userId = Auth::id();
        
        // Ambil data dari tabel 'carts' milik user ini
        $cartItems = Cart::where('user_id', $userId)->get();

        $cart = [];

        foreach ($cartItems as $item) {
            $product = null;
            $jenis = $item->product_type; // Ambil dari kolom product_type
            $id = $item->product_id;      // Ambil dari kolom product_id

            // Logika pencarian produk ke 4 tabel berbeda
            if ($jenis == 'oli') $product = Oli::find($id);
            elseif ($jenis == 'ban') $product = Ban::find($id);
            elseif ($jenis == 'gear') $product = Gear::find($id);
            else $product = Sparepart::find($id);

            if ($product) {
                // Nama Produk (sesuaikan dengan kolom masing-masing tabel)
                $namaProduk = '';
                if ($jenis == 'oli') $namaProduk = $product->namaOli;
                elseif ($jenis == 'ban') $namaProduk = $product->namaBan;
                elseif ($jenis == 'gear') $namaProduk = $product->namaGear;
                else $namaProduk = $product->namaSparepart;

                // Format array agar sesuai dengan View cart.blade.php
                // Key array menggunakan ID dari tabel carts
                $cart[$item->id] = [
                    'id_keranjang' => $item->id, 
                    'product_id' => $id,
                    'product_type' => $jenis,
                    'name' => $namaProduk,
                    'price' => $product->harga,
                    'qty' => $item->qty, 
                    'photo' => $product->gambar
                ];
            }
        }

        // PENTING: Simpan ke session agar view cart.blade.php kamu tetap jalan normal
        session()->put('cart', $cart);

        return view('cart', compact('cart'));
    }

    // 2. MENAMBAH KE KERANJANG (CREATE DATABASE)
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login.form')->with('error', 'Login dulu yuk!');
        }

        $userId = Auth::id();
        // Ambil input dari form HTML
        $idProduk = $request->id_produk;
        $jenis = $request->jenis_barang ?? 'sparepart';
        $qty = $request->qty ?? 1;

        // Cek apakah user sudah punya barang ini di database carts?
        $cekItem = Cart::where('user_id', $userId)
                    ->where('product_id', $idProduk)
                    ->where('product_type', $jenis)
                    ->first();

        if ($cekItem) {
            // Jika ada, update jumlahnya di DATABASE
            $cekItem->qty += $qty;
            $cekItem->save();
        } else {
            // Jika belum ada, buat baru di DATABASE
            Cart::create([
                'user_id' => $userId,
                'product_id' => $idProduk,   
                'product_type' => $jenis,    
                'qty' => $qty
            ]);
        }

        return redirect()->route('cart.show')->with('success', 'Berhasil masuk keranjang!');
    }

    // 3. UPDATE JUMLAH (UPDATE DATABASE)
    public function update(Request $request, $id)
    {
        // $id adalah ID dari tabel carts (Primary Key)
        $item = Cart::find($id);
        
        if ($item) {
            $item->qty = $request->qty;
            $item->save(); // Simpan ke DB
        }

        return back()->with('success', 'Jumlah diperbarui.');
    }

    // 4. HAPUS ITEM (DELETE DATABASE)
    public function remove($id)
    {
        $item = Cart::find($id);
        
        if ($item) {
            $item->delete(); // Hapus dari DB
        }

        return back()->with('success', 'Produk dihapus.');
    }

    // 5. KOSONGKAN KERANJANG (DELETE ALL USER DATA)
    public function clear()
    {
        $userId = Auth::id();
        Cart::where('user_id', $userId)->delete(); // Hapus semua punya user ini dari DB

        // Bersihkan session juga biar sinkron
        session()->forget('cart');

        return back()->with('success', 'Keranjang dikosongkan.');
    }
}