<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXERA MOTOR - Sparepart</title>
    <link rel="stylesheet" href="home.css">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #ff9933;
            padding: 10px 20px;
            color: #000;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .logo-text h1 {
            margin: 0;
            font-size: 20px;
        }

        .page-title {
            font-size: 28px;
            font-weight: bold;
        }

        .back-container {
            margin: 20px;
        }

        .back-btn {
            text-decoration: none;
            background-color: #ff9933;
            color: white;
            padding: 8px 15px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }

        .back-btn:hover {
            background-color: #e67e22;
        }

        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 20px;
            padding: 0 20px 40px;
        }

        .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            text-align: center;
            padding: 10px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            width: 100%;
            height: 150px;
            object-fit: contain;
        }

        .product-name {
            font-weight: bold;
            margin: 10px 0 5px;
        }

        .price {
            color: #e67e22;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <header class="navbar">
        <div class="logo">
            <img src="{{ asset('img/bike.png') }}" alt="Logo Motor" class="logo-icon">
            <div class="logo-text">
                <h1>AXERA MOTOR</h1>
                <p>Bengkel Servis Motor</p>
            </div>
        </div>
        <h2 class="page-title">SPAREPART</h2>
    </header>

   <!-- Tombol kembali dan tambah -->
    <div class="back-container">
        <a href="{{ route('home') }}" class="back-btn">⬅ Kembali</a>

        <!-- 🔹 Tombol Tambah Sparepart -->
        <a href="{{ route('sparepart.create') }}" class="back-btn" style="background-color: #2ecc71;">+ Tambah Sparepart</a>
    </div>

    <!-- Konten produk -->
    <main class="product-container">

    @foreach ($spareparts as $part)
        <div class="product-card">
            
            @if ($part->gambar && Storage::disk('public')->exists($part->gambar))
            <img src="{{ asset('storage/' . $part->gambar) }}" alt="{{ $part->namaSparepart }}">
            @else
            <img src="{{ asset('img/spar1.png') }}" alt="Placeholder">
            @endif
            
            <p class="product-name">{{ $part->namaSparepart }}</p>
            <p class="price">Rp {{ number_format($part->harga, 0, ',', '.') }}</p>
            <p class="stok">Stok: {{ $part->stok }}</p>

            <div style="margin-top: 10px;">
                <a href="{{ route('sparepart.edit', $part->idSparepart) }}" class="back-btn" style="background-color: #3498db;">Edit</a>
                
                <form action="{{ route('sparepart.destroy', $part->idSparepart) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="back-btn" style="background-color: #e74c3c; border:none; cursor:pointer;" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </div>

        </div>
    @endforeach
    </main>
</body>
</html>
