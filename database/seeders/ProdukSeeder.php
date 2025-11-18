<?php

namespace Database\Seeders;

use App\Models\Kategori; // PASTIKAN IMPOR INI ADA
use App\Models\Produk;
use App\Models\Sparepart;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        // 1. AMBIL ID KATEGORI DARI DATABASE (Kunci Perbaikan!)
        // Daripada mengambil seluruh objek, ambil ID-nya saja untuk mencegah masalah binding
        
// Pastikan Anda secara EKSPLISIT meminta kolom Primary Key yang benar: id_kategori
        $idOli = \App\Models\Kategori::where('nama_kategori', 'Oli')->value('id_kategori');
        $idBan = \App\Models\Kategori::where('nama_kategori', 'Ban')->value('id_kategori');
        $idSparepart = \App\Models\Kategori::where('nama_kategori', 'Sparepart')->value('id_kategori'); 
        $idGear = \App\Models\Kategori::where('nama_kategori', 'Gear')->value('id_kategori');
        $idJasa = \App\Models\Kategori::where('nama_kategori', 'Jasa')->value('id_kategori');
        // 2. Gunakan ID langsung untuk pembuatan produk
        
        // Produk 1: MOTUL Oil
        $produkOli = Produk::create([
            'id_kategori' => $idOli, // <-- Gunakan variabel ID
            // ...
        ]);

        // ... (lanjutkan dengan Produk Ban, Jasa, Gear)
        
        // 3. BUAT DATA SPAREPART
        for ($i = 1; $i <= 8; $i++) {
            Sparepart::create([ 
                'id_kategori' => $idSparepart, // <-- Gunakan variabel ID yang sudah dicari
                'namaSparepart' => 'Suku Cadang Motor Generik ' . $i,
                'stok' => 15,
                'harga' => 50000 + ($i * 10000), 
                'gambar' => 'spar' . $i . '.png'
            ]);
        }
    }
}