<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXERA MOTOR - Gear</title>
    <link rel="icon" href="{{ asset('img/logo.png')}} ">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <style>
        /* ================= BACKGROUND ORANYE SAMA SEPERTI HOME ================= */
        body {
            background: linear-gradient(135deg, #ff9800, #ffb74d);
            font-family: Arial, sans-serif;
            min-height: 100vh;
            margin: 0;
        }

        /* HEADER */
        .top-bar {
            display: flex;
            justify-content: space-between;
            padding: 15px 25px;
            align-items: center;
        }
        .back-btn {
            background:#1e88e5;
            color:white;
            border:none;
            padding:8px 18px;
            border-radius:8px;
            cursor:pointer;
        }
        .menu-btn {
            background:none;
            border:none;
            font-size:28px;
            color:white;
            cursor:pointer;
        }
        .menu-dropdown {
            display:none;
            position:absolute;
            right:25px;
            top:60px;
            background:white;
            width:180px;
            border-radius:10px;
            box-shadow:0 4px 12px rgba(0,0,0,0.3);
            overflow:hidden;
        }
        .menu-dropdown a {
            display:block;
            padding:12px;
            color:black;
            text-decoration:none;
        }
        .menu-dropdown a:hover {
            background:#f0f0f0;
        }

        /* SEARCH */
        .search-box {
            text-align:center;
            margin-bottom:20px;
        }
        .search-box input {
            width:50%;
            padding:12px;
            border-radius:10px;
            border:none;
            font-size:16px;
        }

        /* PRODUK */
        .container {
            padding: 20px;
        }
        h1 {
            color: white;
            text-shadow: 1px 1px 3px black;
            margin-bottom: 20px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }
        .product-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            padding: 20px;
            text-align: center;
        }
        .product-card img {
            width: 180px;
            height: 180px;
            object-fit: contain;
            margin-bottom: 10px;
        }
        .product-name {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .price {
            color: #d32f2f;
            font-size: 1.1em;
            margin-bottom: 10px;
        }

        .quantity-control {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
        }
        .quantity-control button {
            width: 30px;
            height: 30px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            background: #555;
            color: #fff;
            border-radius: 50%;
            cursor: pointer;
        }
        .quantity-control input {
            width: 40px;
            text-align: center;
            border: none;
            background: #f0f0f0;
            margin: 0 5px;
            font-size: 16px;
        }

        .buy-btn {
            background: #1e88e5;
            color: #fff;
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            cursor: pointer;
            transition: 0.3s;
        }
        .buy-btn:hover {
            background: #1565c0;
        }
    </style>
</head>

<body>

<div class="top-bar">
    <button class="back-btn" onclick="window.history.back()">⬅ Kembali</button>

    <button class="menu-btn" id="menuBtn">⋮</button>

    <div class="menu-dropdown" id="menuDropdown">
        <a href="/produk/tambah">➕ Tambah Produk</a>
        <a href="/produk/edit">✏ Edit Produk</a>
        <a href="/produk/hapus">🗑 Hapus Produk</a>
    </div>
</div>

<script>
document.getElementById("menuBtn").onclick = function() {
    let menu = document.getElementById("menuDropdown");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
};
</script>

<div class="container">
    <h1>🛠️ Gear & Sparepart</h1>

    <div class="search-box">
        <input type="text" id="searchInput" placeholder="Cari produk...">
    </div>

    <script>
    document.getElementById("searchInput").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let cards = document.getElementsByClassName("product-card");

        for (let card of cards) {
            let name = card.querySelector(".product-name").innerText.toLowerCase();
            card.style.display = name.includes(filter) ? "" : "none";
        }
    });
    </script>

    <div class="product-grid">

        <!-- PRODUK 1 -->
        <div class="product-card">
            <img src="{{ asset('img/gear1.png') }}" alt="Gear 1">
            <p class="product-name">GEAR SET RANTAI MEGA PRO VERZA SONIC CB150R KYE</p>
            <p class="price">Rp126.500</p>

            <div class="quantity-control">
                <button type="button" onclick="changeQty(this, -1)">-</button>
                <input type="text" value="0" readonly>
                <button type="button" onclick="changeQty(this, 1)">+</button>
            </div>

            <form action="{{ route('detail-transaksi.store') }}" method="POST" class="buy-form" onsubmit="return validateQty(this)">
                @csrf
                <input type="hidden" name="id_transaksi" value="1">
                <input type="hidden" name="id_produk" value="101">
                <input type="hidden" class="qty-input" name="qty" value="0">
                <input type="hidden" name="subtotal" value="0">
                <button type="submit" class="buy-btn">Beli</button>
            </form>
        </div>

        <!-- PRODUK 2 -->
        <div class="product-card">
            <img src="{{ asset('img/gear2.png') }}" alt="Gear 2">
            <p class="product-name">GEAR BELAKANG HONDA TIGER REVO TDR</p>
            <p class="price">Rp98.000</p>

            <div class="quantity-control">
                <button type="button" onclick="changeQty(this, -1)">-</button>
                <input type="text" value="0" readonly>
                <button type="button" onclick="changeQty(this, 1)">+</button>
            </div>

            <form action="{{ route('detail-transaksi.store') }}" method="POST" class="buy-form" onsubmit="return validateQty(this)">
                @csrf
                <input type="hidden" name="id_transaksi" value="1">
                <input type="hidden" name="id_produk" value="102">
                <input type="hidden" class="qty-input" name="qty" value="0">
                <input type="hidden" name="subtotal" value="0">
                <button type="submit" class="buy-btn">Beli</button>
            </form>
        </div>

        <!-- PRODUK 3 -->
        <div class="product-card">
            <img src="{{ asset('img/gear3.png') }}" alt="Gear 3">
            <p class="product-name">GEAR DEPAN YAMAHA VIXION R15</p>
            <p class="price">Rp85.000</p>

            <div class="quantity-control">
                <button type="button" onclick="changeQty(this, -1)">-</button>
                <input type="text" value="0" readonly>
                <button type="button" onclick="changeQty(this, 1)">+</button>
            </div>

            <form action="{{ route('detail-transaksi.store') }}" method="POST" class="buy-form" onsubmit="return validateQty(this)">
                @csrf
                <input type="hidden" name="id_transaksi" value="1">
                <input type="hidden" name="id_produk" value="103">
                <input type="hidden" class="qty-input" name="qty" value="0">
                <input type="hidden" name="subtotal" value="0">
                <button type="submit" class="buy-btn">Beli</button>
            </form>
        </div>

        <!-- PRODUK 4 -->
        <div class="product-card">
            <img src="{{ asset('img/gear4.png') }}" alt="Gear 4">
            <p class="product-name">GEAR DEPAN SUPRA FIT</p>
            <p class="price">Rp65.000</p>

            <div class="quantity-control">
                <button type="button" onclick="changeQty(this, -1)">-</button>
                <input type="text" value="0" readonly>
                <button type="button" onclick="changeQty(this, 1)">+</button>
            </div>

            <form action="{{ route('detail-transaksi.store') }}" method="POST" class="buy-form" onsubmit="return validateQty(this)">
                @csrf
                <input type="hidden" name="id_transaksi" value="1">
                <input type="hidden" name="id_produk" value="104">
                <input type="hidden" class="qty-input" name="qty" value="0">
                <input type="hidden" name="subtotal" value="0">
                <button type="submit" class="buy-btn">Beli</button>
            </form>
        </div>

    </div>
</div>

<script>
function changeQty(button, delta) {
    const input = button.parentElement.querySelector('input[type="text"]');
    const hiddenInput = button.parentElement.parentElement.querySelector('.qty-input');
    let value = parseInt(input.value);
    value = Math.max(0, value + delta);
    input.value = value;
    hiddenInput.value = value;

    const priceText = button.closest('.product-card').querySelector('.price').innerText;
    const price = parseInt(priceText.replace(/[^0-9]/g, ''));
    const form = button.closest('.product-card').querySelector('form');
    form.querySelector('input[name="subtotal"]').value = price * value;
}

function validateQty(form) {
    const qty = parseInt(form.querySelector('.qty-input').value);
    if (qty === 0) {
        alert('Jumlah barang harus lebih dari 0 sebelum membeli!');
        return false;
    }
    return true;
}
</script>

</body>
</html>
