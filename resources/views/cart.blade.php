<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
</head>
<body>

    <header>
        <div class="back-container">
            <a href="{{ route('home') }}" class="back-btn">⬅ Kembali</a>
        </div>

        <h2>Keranjang Belanja</h2>
    </header>

    <div class="cart-page">
        <div class="cart-container">
            
            <div class="cart-items">
                @if(session('cart') && count(session('cart')) > 0)
                    @foreach(session('cart') as $id => $item)
                    <div class="cart-item">
                        <input type="checkbox" class="check-item" checked>
                        <img src="{{ asset('img/' . ($item['photo'] ?? 'no-image.jpg')) }}" class="item-img">
                        <div class="item-info">
                            <h2 class="item-name">{{ $item['name'] }}</h2>
                            <p class="item-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="qty-box">
                                @csrf
                                <input type="number" name="qty" value="{{ $item['qty'] }}" min="1" class="qty-input">
                                <button type="submit" class="update-btn">Update</button>
                            </form>
                        </div>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            <button class="delete-btn" onclick="return confirm('Hapus?')">✕</button>
                        </form>
                    </div>
                    @endforeach
                @else
                    <div style="text-align: center; padding: 50px; background: white; border-radius: 8px;">
                        <h3>Keranjang Kosong</h3>
                        <a href="{{ route('home') }}" style="background:#ff9800; color:white; padding:10px 20px; border-radius:5px; text-decoration:none; display:inline-block; margin-top:10px;">Belanja</a>
                    </div>
                @endif
            </div>

            @if(session('cart') && count(session('cart')) > 0)
            <div class="summary-box">
                <h3>Ringkasan</h3>
                <div class="summary-row">
                    <span>Total Harga</span>
                    <strong style="color: #d32f2f;">Rp {{ number_format(collect(session('cart'))->sum(fn($i) => $i['price'] * $i['qty']), 0, ',', '.') }}</strong>
                </div>
                <a href="/payment" class="checkout-btn">Checkout</a>
                <form action="{{ route('cart.clear') }}" method="POST" style="text-align: center;">
                    @csrf
                    <button class="clear-btn" onclick="return confirm('Kosongkan?')">Kosongkan Keranjang</button>
                </form>
            </div>
            @endif

        </div>
    </div>

</body>
</html>