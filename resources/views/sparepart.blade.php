<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXERA MOTOR - Sparepart</title>

    <style>
    body {
        background: linear-gradient(135deg, #ff9800, #ffb74d);
        font-family: Arial, sans-serif;
        min-height: 100vh;
        margin: 0;
    }

    /* ================= TOP BAR ================= */
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

    /* MENU TITIK 3 */
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
        z-index: 10;
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

    .container {
        padding: 20px;
    }
    h1 {
        color: white;
        text-shadow: 1px 1px 3px black;
        margin-bottom: 20px;
    }

    /* PRODUK GRID */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
    }

    /* KARTU PRODUK */
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

    /* QTY CONTROL */
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

<!-- TOP BAR -->
<div class="top-bar">
    <button class="back-btn" onclick="window.history.back()">⬅ Kembali</button>

    <!-- Tombol titik tiga -->
    <button class="menu-btn" id="menuBtn">⋮</button>

    <!-- MENU -->
    <div class="menu-dropdown" id="menuDropdown">
        <a href="/sparepart/tambah">➕ Tambah Produk</a>
        <a href="/sparepart/edit">✏ Edit Produk</a>
        <a href="/sparepart/hapus">🗑 Hapus Produk</a>
    </div>
</div>

<script>
document.getElementById("menuBtn").onclick = function() {
    let menu = document.getElementById("menuDropdown");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
};
</script>

<!-- MAIN CONTENT -->
<div class="container">
    <h1>🔧 Sparepart</h1>

    <!-- SEARCH -->
    <div class="search-box">
        <input type="text" id="searchInput" placeholder="Cari sparepart...">
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

    <!-- GRID PRODUK -->
    <div class="product-grid">

        @foreach ($spareparts as $s)
        <div class="product-card">

            <img src="{{ asset('img/spar' . $s->idSparepart . '.png') }}" alt="gambar">

            <p class="product-name">{{ $s->namaSparepart }}</p>
            <p class="price">Rp{{ number_format($s->harga,0,',','.') }}</p>
            <p>Stok: {{ $s->stok }}</p>

            <div class="quantity-control">
                <button type="button" onclick="changeQty(this, -1)">-</button>
                <input type="text" value="0" readonly>
                <button type="button" onclick="changeQty(this, 1)">+</button>
            </div>

            <button class="buy-btn">Beli</button>
        </div>
        @endforeach

    </div>
</div>

<script>
function changeQty(button, delta) {
    const input = button.parentElement.querySelector('input[type="text"]');
    let value = parseInt(input.value);
    value = Math.max(0, value + delta);
    input.value = value;
}
</script>

</body>
</html>
