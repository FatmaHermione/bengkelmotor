<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Sparepart</title>
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #f4f4f4; 
            margin: 20px; 
        }
        .form-container { 
            max-width: 500px; 
            margin: auto; 
            padding: 20px; 
            background: #fff; 
            border-radius: 8px; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.1); 
        }
        .form-group { 
            margin-bottom: 15px; 
        }
        .form-group label { 
            display: block; 
            margin-bottom: 5px; 
            font-weight: bold; 
        }
        .form-group input { 
            width: 95%; 
            padding: 8px; 
            border: 1px solid #ddd; 
            border-radius: 4px; 
        }
        .submit-btn { 
            background-color: #27ae60; 
            color: white; 
            padding: 10px 15px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
        }
        .cancel-btn {
            background-color: #e74c3c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            margin-left: 10px;
        }
        .submit-btn:hover, .cancel-btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Tambah Sparepart Baru</h2>

        <form action="{{ route('sparepart.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="namaSparepart">Nama Sparepart</label>
                <input type="text" id="namaSparepart" name="namaSparepart" placeholder="Masukkan nama sparepart" required>
            </div>

            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" id="stok" name="stok" placeholder="Masukkan jumlah stok" required>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" id="harga" name="harga" placeholder="Masukkan harga" required>
            </div>

            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" id="gambar" name="gambar" accept="image/*">
            </div>

            <button type="submit" class="submit-btn">Simpan Data</button>
            <a href="{{ route('sparepart.index') }}" class="cancel-btn">Batal</a>
        </form>
    </div>

</body>
</html>
