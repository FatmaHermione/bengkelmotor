<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Panggil Seeder yang TIDAK BOLEH BERADA DI DALAM KODE UTAMA
        $this->call([
            KategoriSeeder::class,
            // ProdukSeeder akan mengambil ID Kategori yang sudah dijamin ada
            ProdukSeeder::class,
        ]);
        
        // 2. LOGIKA USER, PELANGGAN, DAN TRANSAKSI DUMMY 
        // Variabel Produk/Kategori TIDAK diperlukan lagi di sini karena sudah dibuat.
        
        // Asumsi: Anda perlu me-retrieve objek produk untuk DetailTransaksi:
        $produkOli = \App\Models\Produk::where('nama_produk', 'MOTUL Oil Motor SCOOTER POWER LE')->first();
        $produkBan = \App\Models\Produk::where('nama_produk', 'FDR TL GENZI PRO Ring 14')->first();
        $produkJasa = \App\Models\Produk::where('nama_produk', 'Biaya Jasa Pasang / Servis')->first();
        
        // 1. BUAT USER LOGIN
        $user = User::create([
            'name' => 'Estha Gusti',
            'username' => 'estha',
            'password' => Hash::make('password'), 
        ]);

        // Buat data profil pelanggan untuk user ini
        Pelanggan::create([
            'user_id' => $user->id,
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Paingan, Maguwoharjo, Yogyakarta',
            'jenis_motor_default' => 'Vario 150',
            'no_polisi_default' => 'AB 1234 XY'
        ]);

        // 4. BUAT TRANSAKSI DUMMY
        $transaksi = Transaksi::create([
            'user_id' => $user->id,
            'tanggal_transaksi' => Carbon::now(),
            'total_harga' => 289000, 
            'biaya_admin' => 1000, 
            'metode_pembayaran' => 'BCA Virtual Account',
            'status_pembayaran' => 'lunas', 
        ]);

        // Masukkan Detail Barangnya (Menggunakan PK standar ->id)
        // 1. Beli Oli
        DetailTransaksi::create([
            'id_transaksi' => $transaksi->id,
            'id_produk' => $produkOli->id,
            'jumlah' => 1,
            'harga_satuan' => 62000,
            'subtotal' => 62000
        ]);

        // 2. Beli Ban
        DetailTransaksi::create([
            'id_transaksi' => $transaksi->id,
            'id_produk' => $produkBan->id,
            'jumlah' => 1,
            'harga_satuan' => 212000,
            'subtotal' => 212000
        ]);

        // 3. Bayar Jasa
        DetailTransaksi::create([
            'id_transaksi' => $transaksi->id,
            'id_produk' => $produkJasa->id,
            'jumlah' => 1,
            'harga_satuan' => 14000,
            'subtotal' => 14000
        ]);
    }
}