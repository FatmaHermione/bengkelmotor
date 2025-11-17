<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaksi;

class DetailTransaksiController extends Controller
{
    // Menampilkan semua data detail transaksi
    public function index()
    {
        $data = DetailTransaksi::all();
        return response()->json($data);
    }

    // Menampilkan satu data berdasarkan id_detail
    public function show($id)
    {
        $detail = DetailTransaksi::find($id);

        if (!$detail) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($detail);
    }

    // Menyimpan data baru
    public function store(Request $request)
{
    $request->validate([
        'id_transaksi' => 'required|integer',
        'id_produk' => 'required|integer',
        'qty' => 'required|integer|min:1',
        'subtotal' => 'required|numeric|min:0',
    ]);

    $detail = DetailTransaksi::create([
        'id_transaksi' => $request->id_transaksi,
        'id_produk' => $request->id_produk,
        'qty' => $request->qty,
        'subtotal' => $request->subtotal,
    ]);

    // setelah simpan, langsung ke halaman pembayaran
    return redirect()->route('pembayaran.index')
                     ->with('success', 'Produk berhasil ditambahkan ke transaksi!');
}


    public function pembayaran()
    {
        $details = \App\Models\DetailTransaksi::all();
        $total = $details->sum('subtotal');
        return view('pembayaran', compact('details', 'total'));
    }


    // Mengupdate data detail transaksi
    public function update(Request $request, $id)
    {
        $detail = DetailTransaksi::find($id);

        if (!$detail) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $request->validate([
            'id_transaksi' => 'integer',
            'id_produk' => 'integer',
            'qty' => 'integer|min:1',
            'subtotal' => 'numeric|min:0',
        ]);

        $detail->update($request->all());

        return response()->json([
            'message' => 'Data berhasil diperbarui',
            'data' => $detail
        ]);
    }

    // Menghapus data detail transaksi
    public function destroy($id)
    {
        $detail = DetailTransaksi::find($id);

        if (!$detail) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $detail->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
