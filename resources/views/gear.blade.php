<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXERA MOTOR - Gear</title>
    <link rel="icon" href="{{ asset('img/logo.png')}} ">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
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
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
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

        .quantity-control {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 8px 0;
        }

        .quantity-control button {
            background-color: #ff9933;
            border: none;
            color: white;
            font-size: 16px;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            cursor: pointer;
        }

        .quantity-control input {
            width: 40px;
            text-align: center;
            border: 1px solid #ccc;
            margin: 0 5px;
            border-radius: 4px;
        }

        .buy-btn, .cart-btn {
            background-color: #ff9933;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
            margin-top: 5px;
        }

        .buy-btn:hover, .cart-btn:hover {
            background-color: #e67e22;
        }

        .cart-icon {
            font-size: 24px;
            cursor: pointer;
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="navbar">
        <div class="logo">
            <img src="{{ asset('img/bike.png') }}" alt="Logo Motor" class="logo-icon">
            <div class="logo-text">
                <h1>AXERA MOTOR</h1>
                <p>Bengkel Servis Motor</p>
            </div>
        </div>
        <div>
            <span class="cart-icon">🛒</span>
            <h2 class="page-title">GEAR</h2>
        </div>
    </header>

    <!-- Tombol kembali -->
    <div class="back-container">
        <a href="{{ route('home') }}" class="back-btn">⬅ Kembali</a>
    </div>

    <!-- Konten produk -->
    <main class="product-container">
        <div class="product-card">
            <img src="{{ asset('img/gear1.png') }}" alt="Gear 1">
            <p class="product-name">GEAR SET RANTAI MEGA PRO VERZA SONIC CB150R FI KYE</p>
            <p class="price">Rp126.500</p>
            <div class="quantity-control">
                <button onclick="changeQty(this, -1)">-</button>
                <input type="text" value="1" readonly>
                <button onclick="changeQty(this, 1)">+</button>
            </div>
            <button class="cart-btn" onclick="addToCart(this)">🛒 Keranjang</button>
            <button class="buy-btn" onclick="buyNow(this)">Beli</button>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/gear2.png') }}" alt="Gear 2">
            <p class="product-name">GEAR SET JUPITER MX NEW 135 MX NEW 50C</p>
            <p class="price">Rp116.000</p>
            <div class="quantity-control">
                <button onclick="changeQty(this, -1)">-</button>
                <input type="text" value="1" readonly>
                <button onclick="changeQty(this, 1)">+</button>
            </div>
            <button class="cart-btn" onclick="addToCart(this)">🛒 Keranjang</button>
            <button class="buy-btn" onclick="buyNow(this)">Beli</button>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/gear3.png') }}" alt="Gear 3">
            <p class="product-name">GEAR SET KHARISMA SUPRA X 125 KARBU KIRANA KPH</p>
            <p class="price">Rp110.000</p>
            <div class="quantity-control">
                <button onclick="changeQty(this, -1)">-</button>
                <input type="text" value="1" readonly>
                <button onclick="changeQty(this, 1)">+</button>
            </div>
            <button class="cart-btn" onclick="addToCart(this)">🛒 Keranjang</button>
            <button class="buy-btn" onclick="buyNow(this)">Beli</button>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/gear4.png') }}" alt="Gear 4">
            <p class="product-name">GEAR SET SUZUKI SMASH SHOGUN 110 - SHOGUN 125 - SMASH 110</p>
            <p class="price">Rp116.000</p>
            <div class="quantity-control">
                <button onclick="changeQty(this, -1)">-</button>
                <input type="text" value="1" readonly>
                <button onclick="changeQty(this, 1)">+</button>
            </div>
            <button class="cart-btn" onclick="addToCart(this)">🛒 Keranjang</button>
            <button class="buy-btn" onclick="buyNow(this)">Beli</button>
        </div>
    </main>

    <script>
        function changeQty(button, delta) {
            const input = button.parentElement.querySelector('input');
            let value = parseInt(input.value);
            value = Math.max(1, value + delta);
            input.value = value;
        }

        function addToCart(button) {
            const product = button.parentElement.querySelector('.product-name').innerText;
            alert(product + " telah ditambahkan ke keranjang 🛒");
        }

        function buyNow(button) {
            const product = button.parentElement.querySelector('.product-name').innerText;
            alert("Anda membeli " + product + " ✅");
        }
    </script>

</body>
</html>
