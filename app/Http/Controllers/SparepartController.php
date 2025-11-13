<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sparepart;
use Illuminate\Support\Facades\Storage; 

class SparepartController extends Controller
{
    // Menampilkan semua data sparepart
    public function index()
    {
        $spareparts = Sparepart::all();
        return view('sparepart', compact('spareparts'));
    }

    // Menampilkan form tambah data sparepart
    public function create()
    {
        return view('sparepart.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'namaSparepart' => 'required|string|max:100',
        'stok' => 'required|integer',
        'harga' => 'required|numeric',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' 
    ]);

    $data = $request->all();

    if ($request->hasFile('gambar')) {
        // Simpan gambar di folder 'storage/app/public/spareparts'
        // dan simpan path-nya (mis: 'spareparts/namafile.jpg')
        $path = $request->file('gambar')->store('spareparts', 'public');
        $data['gambar'] = $path;
    }

    Sparepart::create($data);

    return redirect()->route('sparepart.index')->with('success', 'Data sparepart berhasil ditambahkan.');
    }

    // Menampilkan form edit sparepart
    public function edit($id)
    {
        $sparepart = Sparepart::findOrFail($id);
        return view('sparepart_edit', compact('sparepart'));
    }

    public function update(Request $request, $id){
    $request->validate([
        'namaSparepart' => 'required|string|max:100',
        'stok' => 'required|integer',
        'harga' => 'required|numeric',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $sparepart = Sparepart::findOrFail($id);
    $data = $request->all();

    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
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

    // Menghapus data sparepart
    public function destroy($id)
    {
        $sparepart = Sparepart::findOrFail($id);
        $sparepart->delete();

        return redirect()->route('sparepart.index')->with('success', 'Data sparepart berhasil dihapus.');
    }
}
