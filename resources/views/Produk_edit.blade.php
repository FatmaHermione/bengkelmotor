<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - AXERA MOTOR</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/produk-tambah.css') }}">
    <style>
        /* Tambahan style khusus untuk preview gambar di halaman edit */
        .img-preview {
            margin-top: 10px;
            max-width: 150px;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
        }
        .btn-submit {
            background-color: #ffc107; /* Warna kuning khas tombol Edit */
            color: black;
        }
        .btn-submit:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>✏️ Edit Produk</h2>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- 
        PERUBAHAN 1: Action diarahkan ke route update
        PERUBAHAN 2: Menambahkan ID produk di dalam route
    --}}
    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- PERUBAHAN 3: Tambahkan method PUT karena HTML form standar tidak mendukung PUT --}}
        @method('PUT')

        {{-- Nama Produk --}}
        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            {{-- PERUBAHAN 4: value diisi dengan data lama ($produk->nama_produk) --}}
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" 
                   value="{{ old('nama_produk', $produk->nama_produk) }}" required>
        </div>

        {{-- Kategori --}}
        <div class="form-group">
            <label for="id_kategori">Kategori</label>
            <select class="form-select" id="id_kategori" name="id_kategori" required>
                <option value="">Pilih Kategori</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id_kategori }}" 
                        {{-- PERUBAHAN 5: Logika untuk memilih otomatis kategori yang sudah tersimpan --}}
                        {{ old('id_kategori', $produk->id_kategori) == $kategori->id_kategori ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        
        {{-- Harga --}}
        <div class="form-group">
            <label for="harga">Harga (Rp)</label>
            <input type="number" class="form-control" id="harga" name="harga" 
                   value="{{ old('harga', $produk->harga) }}" required min="0">
        </div>  

        {{-- Stok --}}
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" 
                   value="{{ old('stok', $produk->stok) }}" required min="0">
        </div>

        {{-- Deskripsi (Jika ada di database) --}}
        <div class="form-group">
            <label for="deskripsi">Deskripsi (Opsional)</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
        </div>

        {{-- Gambar --}}
        <div class="form-group">
            <label for="gambar">Gambar (Biarkan kosong jika tidak ingin mengganti)</label>
            <input type="file" class="form-control" id="gambar" name="gambar">

            {{-- PERUBAHAN 6: Menampilkan preview gambar saat ini --}}
            @if($produk->gambar)
                <div style="margin-top: 10px;">
                    <small>Gambar Saat Ini:</small><br>
                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Preview Gambar" class="img-preview">
                </div>
            @endif
        </div>

        <button type="submit" class="btn-submit">Simpan Perubahan</button>
        
        <div style="text-align: center; margin-top: 15px;">
            <a href="{{ route('oli') }}" style="text-decoration: none; color: #666;">Batal</a>
        </div>
    </form>
</div>

</body>
</html>