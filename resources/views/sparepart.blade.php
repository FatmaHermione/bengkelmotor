<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXERA MOTOR - Sparepart</title>
    <link rel="icon" href="{{ asset('img/logo.png')}} ">
    <link rel="stylesheet" href="{{ asset('css/oli.css') }}">
</head>

<body>

{{-- ===== TOP BAR SEPERTI OLI ===== --}}
<div class="top-bar">
    <button class="back-btn" onclick="window.history.back()">⬅ Kembali</button>

    <button class="menu-btn" id="menuBtn">⋮</button>

    <div class="menu-dropdown" id="menuDropdown">
        <a href="/produk/tambah">➕ Tambah Produk</a>
        <a href="/produk/edit">✏ Edit Produk</a>
        <a href="/produk/hapus">🗑 Hapus Produk</a>
    </div>
</div>

<div class="container">

    <h1>🔧 Sparepart Motor</h1>

    {{-- SEARCH SAMA DENGAN OLI --}}
    <div class="search-box">
        <input type="text" id="searchInput" placeholder="Cari produk...">
    </div>

    {{-- GRID PRODUK SPAREPART --}}
    <div class="product-grid">

        @foreach ($spareparts as $s)
        <div class="product-card">

            {{-- GAMBAR (DIPERBAIKI SUPAYA TIDAK HILANG) --}}
            <img src="{{ asset('img/' . $s->gambar) }}" alt="{{ $s->nama }}">

            {{-- NAMA --}}
            <p class="product-name">{{ $s->nama }}</p>

            {{-- HARGA --}}
            <p class="price">Rp{{ number_format($s->harga, 0, ',', '.') }}</p>

            {{-- KONTROL JUMLAH --}}
            <div class="quantity-control">
                <button onclick="changeQty(this, -1)">-</button>
                <input type="text" value="0" readonly>
                <button onclick="changeQty(this, 1)">+</button>
            </div>

            {{-- BELI --}}
            <form action="{{ route('detail-transaksi.store') }}" method="POST" onsubmit="return validateQty(this)">
                @csrf
                <input type="hidden" name="id_transaksi" value="2">
                <input type="hidden" name="id_produk" value="{{ $s->id }}">
                <input type="hidden" class="qty-input" name="qty" value="0">
                <input type="hidden" name="subtotal" value="0">
                <button class="buy-btn">Beli</button>
            </form>

        </div>
        @endforeach

    </div>
</div>

{{-- ===== SCRIPT DROPDOWN ===== --}}
<script>
document.getElementById("menuBtn").onclick = function() {
    let menu = document.getElementById("menuDropdown");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
};

document.getElementById("searchInput").addEventListener("keyup", function() {
    let filter = this.value.toLowerCase();
    let cards = document.getElementsByClassName("product-card");

    for (let card of cards) {
        let name = card.querySelector(".product-name").innerText.toLowerCase();
        card.style.display = name.includes(filter) ? "" : "none";
    }
});
</script>

{{-- ===== SCRIPT QTY ===== --}}
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
