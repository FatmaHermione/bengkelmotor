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

</style>
</head>

<body>

<!-- HEADER -->
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

<!-- CONTENT -->
<div class="container">
    <h1>🛞 Ban Motor</h1>

    <!-- SEARCH BAR -->
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

    <!-- PRODUK 8 ITEM -->
    <div class="product-grid">

        <div class="product-card">
            <img src="{{ asset('img/ban1.png') }}">
            <p class="product-name">FDR TT/TL FLEMMO RING 14 BAN MOTOR 80/90-14 TL</p>
            <p class="price">Rp225.000</p>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/ban2.png') }}">
            <p class="product-name">FDR TL SPORT MP27 RING 14 90/80-14</p>
            <p class="price">Rp369.000</p>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/ban3.png') }}">
            <p class="product-name">FDR TT/TL SPARTAX RING 17 70/90-17</p>
            <p class="price">Rp174.000</p>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/ban4.png') }}">
            <p class="product-name">FDR TL SPORT MP76 RING 17 90/80-17</p>
            <p class="price">Rp477.000</p>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/ban5.png') }}">
            <p class="product-name">FDR TL SPORT XR EVO RING 14 80/90-14</p>
            <p class="price">Rp230.000</p>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/ban6.png') }}">
            <p class="product-name">FDR TL GENZI PRO RING 14 80/80-14</p>
            <p class="price">Rp212.000</p>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/ban7.png') }}">
            <p class="product-name">IRC NF66 TUBELESS 80/90-14</p>
            <p class="price">Rp221.000</p>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/ban8.png') }}">
            <p class="product-name">IRC GP5 SEMI TRAIL RING 14 80/90 & 90/90</p>
            <p class="price">Rp225.000</p>
        </div>

    </div>

</div>

</body>
</html>
