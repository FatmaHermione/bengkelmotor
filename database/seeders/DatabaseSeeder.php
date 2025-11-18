<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Sparepart;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. BUAT USER LOGIN
        $user = User::create([
            'name' => 'Estha Gusti',
            'username' => 'estha',
            // PERBAIKAN: Kolom 'email' dihapus karena tidak wajib (nullable)
            // 'email' => 'estha@example.com', 
            'password' => Hash::make('password'), // password login: password
        ]);

        // Buat data profil pelanggan untuk user ini
        Pelanggan::create([
            'user_id' => $user->id,
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Paingan, Maguwoharjo, Yogyakarta',
            'jenis_motor_default' => 'Vario 150',
            'no_polisi_default' => 'AB 1234 XY'
        ]);

        // 2. BUAT KATEGORI (Sesuai Tab di gambar)
        $katOli = Kategori::create(['nama_kategori' => 'Oli', 'keterangan' => 'Pelumas Mesin']);
        $katBan = Kategori::create(['nama_kategori' => 'Ban', 'keterangan' => 'Ban Tubeless & Biasa']);
        $katSparepart = Kategori::create(['nama_kategori' => 'Sparepart', 'keterangan' => 'Suku cadang asli']);
        $katGear = Kategori::create(['nama_kategori' => 'Gear', 'keterangan' => 'Gear set & Rantai']);
        // Kategori khusus untuk Jasa Servis (supaya bisa masuk keranjang seperti di nota)
        $katJasa = Kategori::create(['nama_kategori' => 'Jasa', 'keterangan' => 'Biaya Pemasangan/Servis']);

        // 3. BUAT PRODUK (Sesuai Screenshot Nota/Detail)
        
        // Produk 1: MOTUL Oil (Dari gambar Detail)
        $produkOli = Produk::create([
            'id_kategori' => $katOli->id_kategori,
            'nama_produk' => 'MOTUL Oil Motor SCOOTER POWER LE',
            'harga' => 62000,
            'stok' => 50,
            'deskripsi' => '4T 5W40 - 0.8 Kendaraan Mesin Oil',
            'gambar' => 'oli_motul.jpg' // Pastikan nanti ada file gambarnya
        ]);

        // Produk 2: FDR Tire (Dari gambar Detail)
        $produkBan = Produk::create([
            'id_kategori' => $katBan->id_kategori,
            'nama_produk' => 'FDR TL GENZI PRO Ring 14',
            'harga' => 212000,
            'stok' => 20,
            'deskripsi' => 'Ban Motor Tubeless Accessories Motorcycle',
            'gambar' => 'ban_fdr.jpg'
        ]);

        // Produk 3: Biaya Jasa (Dari gambar Detail tertulis + Rp 14.000)
        // Kita anggap ini sebagai produk jasa
        $produkJasa = Produk::create([
            'id_kategori' => $katJasa->id_kategori,
            'nama_produk' => 'Biaya Jasa Pasang / Servis',
            'harga' => 14000,
            'stok' => 999, // Stok jasa unlimited
            'deskripsi' => 'Biaya jasa mekanik',
            'gambar' => 'icon_service.jpg'
        ]);

        for ($i = 1; $i <= 8; $i++) {
    \App\Models\Sparepart::create([ // Pastikan Anda menggunakan Model Sparepart yang benar
        'id_kategori' => $katSparepart->id_kategori,
        'namaSparepart' => 'Suku Cadang Motor Generik ' . $i,
        'stok' => 15,
        'harga' => 50000 + ($i * 10000), // Harga bervariasi
        'gambar' => 'spar' . $i . '.png'
    ]);
}

        // Tambah produk lain buat pemanis katalog
        Produk::create([
            'id_kategori' => $katGear->id_kategori,
            'nama_produk' => 'Gear Set Vixion Original',
            'harga' => 350000,
            'stok' => 10,
            'gambar' => 'gear_vixion.jpg'
        ]);

        // 4. BUAT TRANSAKSI DUMMY (Supaya halaman Nota & Detail tidak kosong)
        $transaksi = Transaksi::create([
            'user_id' => $user->id,
            'tanggal_transaksi' => Carbon::now(),
            'total_harga' => 289000, 
            'biaya_admin' => 1000, 
            'metode_pembayaran' => 'BCA Virtual Account',
            'status_pembayaran' => 'lunas', // Status selesai/lunas
        ]);

        // Masukkan Detail Barangnya
        // 1. Beli Oli
        DetailTransaksi::create([
            'id_transaksi' => $transaksi->id_transaksi,
            'id_produk' => $produkOli->id_produk,
            'jumlah' => 1,
            'harga_satuan' => 62000,
            'subtotal' => 62000
        ]);

        // 2. Beli Ban
        DetailTransaksi::create([
            'id_transaksi' => $transaksi->id_transaksi,
            'id_produk' => $produkBan->id_produk,
            'jumlah' => 1,
            'harga_satuan' => 212000,
            'subtotal' => 212000
        ]);

        // 3. Bayar Jasa
        DetailTransaksi::create([
            'id_transaksi' => $transaksi->id_transaksi,
            'id_produk' => $produkJasa->id_produk,
            'jumlah' => 1,
            'harga_satuan' => 14000,
            'subtotal' => 14000
        ]);
    }
}