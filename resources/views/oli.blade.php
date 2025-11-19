<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXERA MOTOR - Oli</title>
    <link rel="icon" href="{{ asset('img/logo.png')}} ">
    <link rel="stylesheet" href="{{ asset('css/oli.css') }}">
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

<div class="container">
    <h1>🛢️ Oli Motor</h1>

    <div class="search-box">
        <input type="text" id="searchInput" placeholder="Cari produk...">
    </div>

    <div class="product-grid">

        <!-- PRODUK 1 -->
        <div class="product-card">
            <img src="{{ asset('img/oli1.png') }}" alt="Oli 1">
            <p class="product-name">OLI MOTOR SHELL ADVANCE AX7 SCOOTER 10W-30 (0.8L)</p>
            <p class="price">Rp64.000</p>

            <div class="quantity-control">
                <button onclick="changeQty(this, -1)">-</button>
                <input type="text" value="0" readonly>
                <button onclick="changeQty(this, 1)">+</button>
            </div>

            <form action="{{ route('detail-transaksi.store') }}" method="POST" onsubmit="return validateQty(this)">
                @csrf
                <input type="hidden" name="id_transaksi" value="2">
                <input type="hidden" name="id_produk" value="201">
                <input type="hidden" class="qty-input" name="qty" value="0">
                <input type="hidden" name="subtotal" value="0">
                <button class="buy-btn">Beli</button>
            </form>
        </div>

        <!-- PRODUK 2 -->
        <div class="product-card">
            <img src="{{ asset('img/oli2.png') }}" alt="Oli 2">
            <p class="product-name">MOTUL GP POWER 10W-40 4T MANUAL (1L)</p>
            <p class="price">Rp74.000</p>

            <div class="quantity-control">
                <button onclick="changeQty(this, -1)">-</button>
                <input type="text" value="0" readonly>
                <button onclick="changeQty(this, 1)">+</button>
            </div>

            <form action="{{ route('detail-transaksi.store') }}" method="POST" onsubmit="return validateQty(this)">
                @csrf
                <input type="hidden" name="id_transaksi" value="2">
                <input type="hidden" name="id_produk" value="202">
                <input type="hidden" class="qty-input" name="qty" value="0">
                <input type="hidden" name="subtotal" value="0">
                <button class="buy-btn">Beli</button>
            </form>
        </div>

        <!-- PRODUK 3 -->
        <div class="product-card">
            <img src="{{ asset('img/oli3.png') }}" alt="Oli 3">
            <p class="product-name">MOTUL SCOOTER POWER LE 4T 5W-40 (0.8L)</p>
            <p class="price">Rp82.000</p>

            <div class="quantity-control">
                <button onclick="changeQty(this, -1)">-</button>
                <input type="text" value="0" readonly>
                <button onclick="changeQty(this, 1)">+</button>
            </div>

            <form action="{{ route('detail-transaksi.store') }}" method="POST" onsubmit="return validateQty(this)">
                @csrf
                <input type="hidden" name="id_transaksi" value="2">
                <input type="hidden" name="id_produk" value="203">
                <input type="hidden" class="qty-input" name="qty" value="0">
                <input type="hidden" name="subtotal" value="0">
                <button class="buy-btn">Beli</button>
            </form>
        </div>

        <!-- PRODUK 4 -->
        <div class="product-card">
            <img src="{{ asset('img/oli4.png') }}" alt="Oli 4">
            <p class="product-name">SHELL ADVANCE AX5 SCOOTER 10W-30 (0.8L)</p>
            <p class="price">Rp46.000</p>

            <div class="quantity-control">
                <button onclick="changeQty(this, -1)">-</button>
                <input type="text" value="0" readonly>
                <button onclick="changeQty(this, 1)">+</button>
            </div>

            <form action="{{ route('detail-transaksi.store') }}" method="POST" onsubmit="return validateQty(this)">
                @csrf
                <input type="hidden" name="id_transaksi" value="2">
                <input type="hidden" name="id_produk" value="204">
                <input type="hidden" class="qty-input" name="qty" value="0">
                <input type="hidden" name="subtotal" value="0">
                <button class="buy-btn">Beli</button>
            </form>
        </div>

    </div>
</div>

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
