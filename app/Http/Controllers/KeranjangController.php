<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Models\Transaksi; // <-- TAMBAHKAN INI
use Illuminate\Support\Facades\Auth; // <-- TAMBAHKAN INI

class KeranjangController extends Controller
{
    // ... (metode index, show, update, destroy lainnya)

    // Menyimpan data baru
    public function store(Request $request)
    {
        // 1. OTOMASI ID TRANSAKSI AKTIF (Ini adalah bagian yang HILANG)
        // Cari transaksi yang statusnya 'pending' milik user yang sedang login.
        // Jika tidak ada, buat transaksi baru.
        $transaksi_aktif = Transaksi::firstOrCreate(
            [
                'user_id' => Auth::id(), // Cari berdasarkan ID User yang sedang login
                'status_pembayaran' => 'pending' // Status 'pending' menandakan keranjang aktif
            ],
            [
                // Data default jika transaksi baru dibuat
                'tanggal_transaksi' => now(),
                'total_harga' => 0,
                'metode_pembayaran' => 'Cash', // Default
            ]
        );
        
        // 2. VALIDASI (Hapus validasi id_transaksi karena sudah ditangani di atas)
        $request->validate([
            // 'id_transaksi' => 'required|integer', // <-- BARIS INI TIDAK DIPERLUKAN LAGI
            'id_produk' => 'required|integer',
            'qty' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
        ]);

        // 3. SIMPAN KE DETAIL TRANSAKSI
        $detail = DetailTransaksi::create([
            'id_transaksi' => $transaksi_aktif->id_transaksi, // <-- Menggunakan ID yang AKTIF
            'id_produk' => $request->id_produk,
            'jumlah' => $request->qty,
            // Perhatian: Sebaiknya hitung harga_satuan di sini, 
            // tapi saat ini kita ikut struktur yang Anda gunakan.
            'harga_satuan' => $request->subtotal / $request->qty,
            'subtotal' => $request->subtotal,
        ]);

        // 4. UPDATE TOTAL HARGA di transaksi induk
        $transaksi_aktif->increment('total_harga', $detail->subtotal);

        // Setelah simpan, langsung ke halaman pembayaran
        return redirect()->route('pembayaran')
                         ->with('success', 'Produk berhasil ditambahkan ke keranjang!');
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
