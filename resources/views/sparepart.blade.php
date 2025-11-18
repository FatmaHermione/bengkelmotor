<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXERA MOTOR - Sparepart</title>

    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/sparepart.css') }}">
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
