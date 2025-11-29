<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oli;
use App\Models\Ban;
use App\Models\Gear;
use App\Models\Sparepart;

class ProdukController extends Controller
{
    // Menampilkan Form Tambah
    public function create()
    {
        return view('produk_tambah'); 
    }

    // Menyimpan Data Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'kategori'    => 'required|in:oli,ban,gear,sparepart',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Upload Gambar
        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            $destinationPath = public_path('img');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $file->move($destinationPath, $filename);
        }

        $kategori = $request->kategori;

        // Simpan Data
        if ($kategori == 'oli') {
            Oli::create(['namaOli' => $request->nama_produk, 'harga' => $request->harga, 'stok' => $request->stok, 'gambar' => $filename]);
            return redirect()->route('oli')->with('success', 'Produk Oli Berhasil Ditambahkan');

        } elseif ($kategori == 'ban') {
            Ban::create(['namaBan' => $request->nama_produk, 'harga' => $request->harga, 'stok' => $request->stok, 'gambar' => $filename]);
            return redirect()->route('ban')->with('success', 'Produk Ban Berhasil Ditambahkan');

        } elseif ($kategori == 'gear') {
            Gear::create(['namaGear' => $request->nama_produk, 'harga' => $request->harga, 'stok' => $request->stok, 'gambar' => $filename]);
            return redirect()->route('gear')->with('success', 'Produk Gear Berhasil Ditambahkan');

        } elseif ($kategori == 'sparepart') {
            Sparepart::create(['namaSparepart' => $request->nama_produk, 'harga' => $request->harga, 'stok' => $request->stok, 'gambar' => $filename]);
            return redirect()->route('sparepart.index')->with('success', 'Sparepart Berhasil Ditambahkan');
        }

        return redirect()->back()->with('error', 'Kategori tidak valid');
    }

    // Menampilkan Form Edit
    public function edit($kategori, $id)
    {
        $produk = null;
        $nama_produk = '';

        if ($kategori == 'oli') {
            $produk = Oli::findOrFail($id);
            $nama_produk = $produk->namaOli;
        } elseif ($kategori == 'ban') {
            $produk = Ban::findOrFail($id);
            $nama_produk = $produk->namaBan;
        } elseif ($kategori == 'gear') {
            $produk = Gear::findOrFail($id);
            $nama_produk = $produk->namaGear;
        } elseif ($kategori == 'sparepart') {
            $produk = Sparepart::findOrFail($id);
            $nama_produk = $produk->namaSparepart;
        } else {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan');
        }

        return view('produk_edit', compact('produk', 'kategori', 'nama_produk'));
    }

    // Update Data
    public function update(Request $request, $kategori, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $model = null;
        if ($kategori == 'oli') $model = Oli::findOrFail($id);
        elseif ($kategori == 'ban') $model = Ban::findOrFail($id);
        elseif ($kategori == 'gear') $model = Gear::findOrFail($id);
        elseif ($kategori == 'sparepart') $model = Sparepart::findOrFail($id);

        $dataUpdate = [
            'harga' => $request->harga,
            'stok'  => $request->stok,
        ];

        // Mapping Nama Kolom
        if ($kategori == 'oli') $dataUpdate['namaOli'] = $request->nama_produk;
        elseif ($kategori == 'ban') $dataUpdate['namaBan'] = $request->nama_produk;
        elseif ($kategori == 'gear') $dataUpdate['namaGear'] = $request->nama_produk;
        elseif ($kategori == 'sparepart') $dataUpdate['namaSparepart'] = $request->nama_produk;

        // Update Gambar
        if ($request->hasFile('gambar')) {
            if ($model->gambar && file_exists(public_path('img/' . $model->gambar))) {
                unlink(public_path('img/' . $model->gambar));
            }
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $dataUpdate['gambar'] = $filename;
        }

        $model->update($dataUpdate);

        // 🔥 LOGIKA REDIRECT YANG BENAR (Konsisten dengan Destroy)
        $routeRedirect = $kategori;
        if ($kategori == 'sparepart') {
            $routeRedirect = 'sparepart.index';
        }

        return redirect()->route($routeRedirect)->with('success', 'Produk berhasil diperbarui!');
    }

    // Hapus Data
    public function destroy($kategori, $id)
    {
        $model = null;
        if ($kategori == 'oli') $model = Oli::findOrFail($id);
        elseif ($kategori == 'ban') $model = Ban::findOrFail($id);
        elseif ($kategori == 'gear') $model = Gear::findOrFail($id);
        elseif ($kategori == 'sparepart') $model = Sparepart::findOrFail($id);

        if ($model->gambar && file_exists(public_path('img/' . $model->gambar))) {
            unlink(public_path('img/' . $model->gambar));
        }

        $model->delete();

        // 🔥 LOGIKA REDIRECT YANG BENAR
        $routeRedirect = $kategori;
        if ($kategori == 'sparepart') {
            $routeRedirect = 'sparepart.index';
        }

        return redirect()->route($routeRedirect)->with('success', 'Produk berhasil dihapus!');
    }
}