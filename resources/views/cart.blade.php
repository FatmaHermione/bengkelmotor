<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
</head>
<body>

<div class="cart-page">

    <h1 class="title">Keranjang Belanja</h1>

    <div class="cart-container">

        <!-- BAGIAN LIST PRODUK -->
        <div class="cart-items">

            @foreach(session('cart', []) as $id => $item)
            <div class="cart-item">

                <!-- Checkbox ala toko online -->
                <input type="checkbox" class="check-item" checked>

                <img src="{{ asset('storage/' . $item['image']) }}" class="item-img">

                <div class="item-info">
                    <h2 class="item-name">{{ $item['name'] }}</h2>
                    <p class="item-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>

                    <form action="{{ route('cart.update', $id) }}" method="POST" class="qty-box">
                        @csrf
                        <button name="action" value="minus" class="qty-btn">−</button>
                        <span class="qty">{{ $item['quantity'] }}</span>
                        <button name="action" value="plus" class="qty-btn">+</button>
                    </form>
                </div>

                <form action="{{ route('cart.remove', $id) }}" method="POST">
                    @csrf
                    <button class="delete-btn">✕</button>
                </form>

            </div>
            @endforeach

        </div>

        <!-- BAGIAN RINGKASAN -->
        <div class="summary-box">
            <h3>Ringkasan Belanja</h3>

            <div class="summary-row">
                <span>Total Barang</span>
                <strong>{{ count(session('cart', [])) }}</strong>
            </div>

            <div class="summary-row">
                <span>Total Harga</span>
                <strong>
                    Rp {{ number_format(collect(session('cart'))->sum(fn($i) => $i['price'] * $i['quantity']), 0, ',', '.') }}
                </strong>
            </div>

            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button class="clear-btn">Kosongkan Keranjang</button>
            </form>

            <a href="/payment" class="checkout-btn">
                Checkout
            </a>
        </div>

    </div>

</div>

</body>
</html>
