<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar produk.
     */
    public function index()
    {
        // Mengambil semua data produk
        $produks = Produk::all();
        
        // Kembalikan ke view list (atau bisa redirect ke route 'oli' jika tidak pakai list admin)
        return view('produk_list', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all(); 
        return view('produk_tambah', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            // Pastikan nama tabel di database adalah 'kategori'
            'id_kategori' => 'required|exists:kategori,id_kategori', 
            'stok'        => 'required|integer|min:0',
            'harga'       => 'required|numeric|min:0',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi'   => 'nullable|string'
        ]);

        $data = $request->all();

        // Hapus token agar tidak ikut tersimpan (walaupun fillable melindunginya, ini best practice)
        unset($data['_token']); 

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('produks', 'public');
            $data['gambar'] = $path;
        }
        
        Produk::create($data);

        // Redirect ke halaman OLI setelah simpan
        return redirect()->route('oli')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     * FUNGSI INI DITAMBAHKAN UNTUK MENCEGAH ERROR "Method show does not exist"
     */
    public function show($id)
    {
        // Jika ada link salah (misal /produk/edit tanpa ID), Laravel akan lari ke sini.
        // Kita lempar balik user ke halaman utama agar tidak error.
        return redirect()->route('oli');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategoris = Kategori::all();
        return view('produk_edit', compact('produk', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi'   => 'nullable|string'
        ]);

        $produk = Produk::findOrFail($id);

        $data = [
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->id_kategori,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'deskripsi'   => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $path = $request->file('gambar')->store('produks', 'public');
            $data['gambar'] = $path;
        }

        $produk->update($data);

        // Redirect ke halaman OLI setelah update
        return redirect()->route('oli')->with('success', 'Data produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);
        
        // Hapus gambar dari penyimpanan jika ada
        if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();

        return redirect()->route('oli')->with('success', 'Produk berhasil dihapus.');
    }
}