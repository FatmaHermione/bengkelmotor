<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Keranjang</title>
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
</head>
<body>

<h1 style="text-align:center;">Keranjang Belanja</h1>

<div class="cart-container">

    @forelse ($cart as $id => $c)
    <div class="cart-item">

        <img src="{{ asset('img/'.$c['gambar']) }}" class="cart-img">

        <div class="info">
            <h2>{{ $c['nama'] }}</h2>
            <p>Harga: Rp {{ number_format($c['harga']) }}</p>
            <p>Jumlah: {{ $c['qty'] }}</p>
        </div>

    </div>
    @empty
        <p>Keranjang masih kosong.</p>
    @endforelse

</div>

</body>
</html>
