<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Sparepart</title>
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f4f4; margin: 20px; }
        .form-container { max-width: 500px; margin: auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input { width: 95%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .submit-btn { background-color: #3498db; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        .current-img { max-width: 100px; margin-top: 10px; }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Edit Sparepart: {{ $sparepart->namaSparepart }}</h2>

        <form action="{{ route('sparepart.update', $sparepart->idSparepart) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <div class="form-group">
                <label for="namaSparepart">Nama Sparepart</label>
                <input type="text" id="namaSparepart" name="namaSparepart" value="{{ $sparepart->namaSparepart }}" required>
            </div>

            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" id="stok" name="stok" value="{{ $sparepart->stok }}" required>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" id="harga" name="harga" value="{{ $sparepart->harga }}" required>
            </div>

            <div class="form-group">
                <label for="gambar">Gambar (Opsional)</label>
                <input type="file" id="gambar" name="gambar">
                
                @if ($sparepart->gambar)
                    <p>Gambar Saat Ini:</p>
                    <img src="{{ asset('storage/' . $sparepart->gambar) }}" alt="{{ $sparepart->namaSparepart }}" class="current-img">
                @endif
            </div>

            <button type="submit" class="submit-btn">Perbarui Data</button>
            <a href="{{ route('sparepart.index') }}">Batal</a>
        </form>
    </div>

</body>
</html>