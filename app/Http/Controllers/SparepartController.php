<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sparepart;
use Illuminate\Support\Facades\Storage;

class SparepartController extends Controller
{
    // 🟧 Menampilkan semua data + form tambah dalam 1 halaman saja
    public function index()
    {
        $spareparts = Sparepart::all();
        return view('sparepart', compact('spareparts'));
    }

    // 🟦 DITAMBAHKAN: show (dibutuhkan oleh Route::resource)
    public function show($id)
    {
        // Tidak pakai halaman show → langsung kembali ke index
        return redirect()->route('sparepart.index');
    }

    // 🟩 DITAMBAHKAN: edit (jika suatu saat ingin popup edit)
    public function edit($id)
    {
        $sparepart = Sparepart::findOrFail($id);
        return view('sparepart_edit', compact('sparepart'));
    }

    // 🟦 Menyimpan data baru (form di halaman index)
    public function store(Request $request)
    {
        $request->validate([
            'namaSparepart' => 'required|string|max:100',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['namaSparepart', 'stok', 'harga']);

        if ($request->hasFile('gambar')) {
            // Simpan gambar
            $path = $request->file('gambar')->store('spareparts', 'public');
            $data['gambar'] = $path;
        }

        Sparepart::create($data);

        return redirect()->route('sparepart.index')->with('success', 'Data sparepart berhasil ditambahkan.');
    }

    // 🟫 Update data tanpa membuat view edit baru
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaSparepart' => 'required|string|max:100',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $sparepart = Sparepart::findOrFail($id);

        $data = $request->only(['namaSparepart', 'stok', 'harga']);

        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($sparepart->gambar && Storage::disk('public')->exists($sparepart->gambar)) {
                Storage::disk('public')->delete($sparepart->gambar);
            }

            // Simpan gambar baru
            $path = $request->file('gambar')->store('spareparts', 'public');
            $data['gambar'] = $path;
        }

        $sparepart->update($data);

        return redirect()->route('sparepart.index')->with('success', 'Data sparepart berhasil diperbarui.');
    }

    // 🟥 Menghapus sparepart
    public function destroy($id)
    {
        $sparepart = Sparepart::findOrFail($id);

        // Hapus gambar jika ada
        if ($sparepart->gambar && Storage::disk('public')->exists($sparepart->gambar)) {
            Storage::disk('public')->delete($sparepart->gambar);
        }

        $sparepart->delete();

        return redirect()->route('sparepart.index')->with('success', 'Data sparepart berhasil dihapus.');
    }
}
