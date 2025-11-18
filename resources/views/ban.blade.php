<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXERA MOTOR - Ban</title>
    <link rel="icon" href="{{ asset('img/logo.png')}} ">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

<style>
    /* ================= BACKGROUND ORANYE SAMA SEPERTI GEAR ================= */
    body {
        background: linear-gradient(135deg, #ff9800, #ffb74d);
        font-family: 'Poppins', sans-serif;
        margin: 0;
        min-height: 100vh;
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

    /* KOTAK PRODUK MIRIP GEAR */
    .product-card {
        background: rgba(255, 255, 255, 0.85);
        border-radius: 15px;
        border: 1px solid rgba(255, 152, 0, 0.35);
        backdrop-filter: blur(5px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.18);
        padding: 20px;
        text-align: center;
        transition: 0.3s;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.28);
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
    
    /* Tambahan Style untuk Quantity Control */
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
    <h1>🛞 Ban Motor</h1>

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

        @php $banProducts = [
            ['id' => 301, 'img' => 'ban1.png', 'name' => 'FDR TT/TL FLEMMO RING 14 BAN MOTOR 80/90-14 TL', 'price' => 225000],
            ['id' => 302, 'img' => 'ban2.png', 'name' => 'FDR TL SPORT MP27 RING 14 90/80-14', 'price' => 369000],
            ['id' => 303, 'img' => 'ban3.png', 'name' => 'FDR TT/TL SPARTAX RING 17 70/90-17', 'price' => 174000],
            ['id' => 304, 'img' => 'ban4.png', 'name' => 'FDR TL SPORT MP76 RING 17 90/80-17', 'price' => 477000],
            ['id' => 305, 'img' => 'ban5.png', 'name' => 'FDR TL SPORT XR EVO RING 14 80/90-14', 'price' => 230000],
            ['id' => 306, 'img' => 'ban6.png', 'name' => 'FDR TL GENZI PRO RING 14 80/80-14', 'price' => 212000],
            ['id' => 307, 'img' => 'ban7.png', 'name' => 'IRC NF66 TUBELESS 80/90-14', 'price' => 221000],
            ['id' => 308, 'img' => 'ban8.png', 'name' => 'IRC GP5 SEMI TRAIL RING 14 80/90 & 90/90', 'price' => 225000]
        ]; @endphp

        @foreach ($banProducts as $product)
        <div class="product-card">
            <img src="{{ asset('img/' . $product['img']) }}">
            <p class="product-name">{{ $product['name'] }}</p>
            <p class="price">Rp{{ number_format($product['price'], 0, ',', '.') }}</p>
            
            <div class="quantity-control">
                <button onclick="changeQty(this, -1)">-</button>
                <input type="text" value="0" readonly>
                <button onclick="changeQty(this, 1)">+</button>
            </div>

            <form action="{{ route('detail-transaksi.store') }}" method="POST" onsubmit="return validateQty(this)">
                @csrf
                <input type="hidden" name="id_transaksi" value="3">
                <input type="hidden" name="id_produk" value="{{ $product['id'] }}">
                <input type="hidden" class="qty-input" name="qty" value="0">
                <input type="hidden" name="subtotal" value="0">
                <button class="buy-btn">Beli</button>
            </form>
        </div>
        @endforeach

    </div>

</div>

<script>
function changeQty(button, delta) {
    const input = button.parentElement.querySelector('input[type="text"]');
    // Cari input tersembunyi dengan class .qty-input yang ada di dalam form card yang sama
    const form = button.closest('.product-card').querySelector('form');
    const hiddenInput = form.querySelector('.qty-input');
    
    let value = parseInt(input.value);
    value = Math.max(0, value + delta);
    input.value = value;
    hiddenInput.value = value;

    // Hitung Subtotal
    const priceText = button.closest('.product-card').querySelector('.price').innerText;
    // Hapus semua karakter non-angka (Rp, titik) untuk mendapatkan harga
    const price = parseInt(priceText.replace(/[^0-9]/g, ''));
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