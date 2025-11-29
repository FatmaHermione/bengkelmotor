<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - AXERA MOTOR</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    
    <style>
        /* CSS TAMBAHAN AGAR LEBIH RAPI */
        body { font-family: sans-serif; background-color: #f9f9f9; margin: 0; }
        
        /* Top Bar seperti halaman produk */
        .top-bar {
            background-color: white;
            padding: 15px 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        
        .back-btn {
            text-decoration: none;
            background-color: #1e88e5;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 14px;
            transition: 0.3s;
        }
        .back-btn:hover { background-color: #1565c0; }

        .qty-box { display: flex; align-items: center; gap: 5px; margin-top: 10px; }
        .qty-input { width: 50px; text-align: center; border: 1px solid #ccc; padding: 5px; border-radius: 4px; }
        .update-btn { 
            font-size: 12px; 
            background-color: #eee; 
            border: 1px solid #ccc; 
            padding: 5px 10px; 
            cursor: pointer; 
            border-radius: 4px;
            color: #333;
        }
        .update-btn:hover { background-color: #ddd; }

        /* Hapus checkbox default browser yang jelek */
        .check-item { transform: scale(1.2); margin-right: 10px; cursor: pointer; }
    </style>
</head>
<body>

{{-- TOP BAR --}}
<div class="top-bar">
    <a href="{{ route('home') }}" class="back-btn">⬅ Kembali ke Home</a>
    <h3 style="margin-left: 20px; color: #333;">Keranjang Belanja</h3>
</div>

<div class="cart-page">

    <div class="cart-container">

        {{-- KOLOM KIRI: DAFTAR BARANG --}}
        <div class="cart-items">

            @if(session('cart') && count(session('cart')) > 0)
                @foreach(session('cart') as $id => $item)
                <div class="cart-item">

                    <input type="checkbox" class="check-item" checked>

                    {{-- GAMBAR PRODUK --}}
                    <img src="{{ asset('img/' . ($item['photo'] ?? 'no-image.jpg')) }}" class="item-img" alt="{{ $item['name'] }}">

                    {{-- INFO PRODUK --}}
                    <div class="item-info">
                        <h2 class="item-name">{{ $item['name'] }}</h2>
                        
                        {{-- HARGA --}}
                        <p class="item-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>

                        {{-- FORM UPDATE QUANTITY --}}
                        <form action="{{ route('cart.update', $id) }}" method="POST" class="qty-box">
                            @csrf
                            <input type="number" name="qty" value="{{ $item['qty'] }}" min="1" class="qty-input">
                            <button type="submit" class="update-btn">Update</button>
                        </form>
                    </div>

                    {{-- TOMBOL HAPUS --}}
                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        <button class="delete-btn" onclick="return confirm('Hapus barang ini?')" title="Hapus Barang">✕</button>
                    </form>

                </div>
                @endforeach
            @else
                {{-- JIKA KERANJANG KOSONG --}}
                <div style="text-align: center; padding: 50px; background: white; border-radius: 8px;">
                    <img src="https://img.icons8.com/ios/100/000000/empty-box.png" alt="Kosong" style="opacity: 0.5;">
                    <h3>Keranjang Belanja Kosong</h3>
                    <p>Yuk belanja sparepart motor kebutuhanmu sekarang!</p>
                    <a href="{{ route('home') }}" style="display:inline-block; margin-top:10px; text-decoration:none; color:white; background:#ff9800; padding:10px 20px; border-radius:5px;">Mulai Belanja</a>
                </div>
            @endif

        </div>

        {{-- KOLOM KANAN: RINGKASAN HARGA --}}
        @if(session('cart') && count(session('cart')) > 0)
        <div class="summary-box">
            <h3>Ringkasan Belanja</h3>

            <div class="summary-row">
                <span>Total Barang</span>
                <strong>{{ collect(session('cart'))->sum('qty') }} pcs</strong>
            </div>

            <div class="summary-row" style="font-size: 1.2em; margin-top: 10px; border-top: 1px solid #eee; padding-top: 10px;">
                <span>Total Harga</span>
                <strong style="color: #d32f2f;">
                    Rp {{ number_format(collect(session('cart'))->sum(fn($i) => $i['price'] * $i['qty']), 0, ',', '.') }}
                </strong>
            </div>

            {{-- TOMBOL CHECKOUT --}}
            <a href="/payment" class="checkout-btn">
                Checkout Sekarang
            </a>

            {{-- TOMBOL KOSONGKAN --}}
            <form action="{{ route('cart.clear') }}" method="POST" style="margin-top: 10px;">
                @csrf
                <button class="clear-btn" onclick="return confirm('Yakin ingin mengosongkan keranjang?')" style="background:none; color:red; border:none; cursor:pointer; text-decoration:underline; width:100%;">
                    Kosongkan Keranjang
                </button>
            </form>
        </div>
        @endif

    </div>

</div>

</body>
</html>