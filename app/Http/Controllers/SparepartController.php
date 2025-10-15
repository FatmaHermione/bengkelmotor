<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sparepart;

class SparepartController extends Controller
{
    // Menampilkan semua data sparepart
    public function index()
    {
        $spareparts = Sparepart::all();
        return view('sparepart.index', compact('spareparts'));
    }

    // Menampilkan form tambah data sparepart
    public function create()
    {
        return view('sparepart.create');
    }

    // Menyimpan data sparepart baru
    public function store(Request $request)
    {
        $request->validate([
            'namaSparepart' => 'required|string|max:100',
            'stok' => 'required|integer',
            'harga' => 'required|numeric'
        ]);

        Sparepart::create($request->all());

        return redirect()->route('sparepart.index')->with('success', 'Data sparepart berhasil ditambahkan.');
    }

    // Menampilkan form edit sparepart
    public function edit($id)
    {
        $sparepart = Sparepart::findOrFail($id);
        return view('sparepart.edit', compact('sparepart'));
    }

    // Menyimpan perubahan data sparepart
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaSparepart' => 'required|string|max:100',
            'stok' => 'required|integer',
            'harga' => 'required|numeric'
        ]);

        $sparepart = Sparepart::findOrFail($id);
        $sparepart->update($request->all());

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
