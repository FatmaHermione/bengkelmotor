<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Baru</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/produk-tambah.css') }}">
</head>
<body>

<div class="container">
    <h2>➕ Tambah Produk Baru</h2>

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

    {{-- Arahkan form ke rute store (POST /produk) --}}
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama Produk --}}
        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ old('nama_produk') }}" required>
        </div>

        {{-- Kategori --}}
        <div class="form-group">
            <label for="id_kategori">Kategori</label>
            <select class="form-select" id="id_kategori" name="id_kategori" required>
                <option value="">Pilih Kategori</option>
                {{-- Loop melalui data kategori yang dikirim dari controller --}}
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id_kategori }}" {{ old('id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        
        {{-- Harga --}}
        <div class="form-group">
            <label for="harga">Harga (Rp)</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}" required min="0">
        </div>  

        {{-- Stok --}}
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok') }}" required min="0">
        </div>

        {{-- Gambar --}}
        <div class="form-group">
            <label for="gambar">Gambar (Opsional)</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>

        <button type="submit" class="btn-submit">Simpan Produk</button>
    </form>
</div>

</body>
</html>