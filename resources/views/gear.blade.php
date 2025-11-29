<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXERA MOTOR - Gear</title>
    <link rel="icon" href="{{ asset('img/logo.png')}} ">
    <link rel="stylesheet" href="{{ asset('css/gear.css') }}">
    
    <style>
        /* CSS KHUSUS MODE ADMIN */
        
        /* Sembunyikan mode admin secara default */
        .action-mode-admin, 
        .cancel-mode-btn {
            display: none;
        }

        /* Container tombol Admin (Supaya Edit & Hapus sejajar) */
        .admin-buttons-container {
            display: flex;
            gap: 10px; /* Jarak antar tombol */
            justify-content: center;
        }

        /* Tombol Edit (Kecil) */
        .btn-edit-card {
            flex: 1; /* Lebar otomatis */
            background: #ff9800;
            color: white;
            text-decoration: none;
            padding: 8px 0;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            text-align: center;
            transition: 0.3s;
        }
        .btn-edit-card:hover {
            background: #e65100;
        }

        /* Tombol Hapus (Kecil) */
        .btn-delete-card {
            flex: 1; /* Lebar otomatis */
            background: #d32f2f;
            color: white;
            border: none;
            padding: 8px 0;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-delete-card:hover {
            background: #b71c1c;
        }

        /* Banner Mode Aktif */
        .mode-active-banner {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            display: none;
            position: sticky;
            top: 0;
            z-index: 100;
        }
    </style>
</head>

<body>

{{-- BANNER INFORMASI MODE --}}
<div id="modeBanner" class="mode-active-banner">
    <span id="modeText">🔧 MODE ADMIN AKTIF</span>
    <button onclick="switchMode('buy')" style="margin-left:10px; cursor:pointer; background:white; border:none; padding:2px 8px; border-radius:4px; font-weight:bold;">Selesai / Keluar</button>
</div>

{{-- TOP BAR --}}
<div class="top-bar">
    <a href="{{ route('home') }}" class="back-btn" style="text-decoration:none;">⬅ Kembali</a>

    {{-- MENU GLOBAL --}}
    <button class="menu-btn" id="menuBtn">⋮</button>
    <div class="menu-dropdown" id="menuDropdown">
        {{-- Link Tambah --}}
        <a href="/produk/tambah">➕ Tambah Produk</a>
        
        {{-- Link Mode Admin (GABUNGAN EDIT & HAPUS) --}}
        <a href="#" onclick="switchMode('admin'); return false;">⚙️ Atur Produk (Edit & Hapus)</a>
        
        {{-- Tombol Batal --}}
        <a href="#" onclick="switchMode('buy'); return false;" class="cancel-mode-btn" style="color: red; border-top: 1px solid #ddd;">❌ Keluar Mode Admin</a>
    </div>
</div>

<div class="container">
    <h1>🛠️ Gear</h1>

    <div class="search-box">
        <input type="text" id="searchInput" placeholder="Cari produk...">
    </div>

    <div class="product-grid">

        @if($gears->isEmpty())
             <p style="color:white; text-align:center; width:100%; grid-column: 1/-1;">Belum ada data Gear di database.</p>
        @else
            @foreach ($gears as $g)
            <div class="product-card">

                {{-- GAMBAR --}}
                <img src="{{ asset('img/' . ($g->gambar ? $g->gambar : 'no-image.jpg')) }}" 
                     alt="{{ $g->namaGear }}"
                     style="object-fit: contain; width: 100%; height: 150px;">

                {{-- NAMA --}}
                <p class="product-name">{{ $g->namaGear }}</p>

                {{-- HARGA --}}
                <p class="price">Rp{{ number_format($g->harga, 0, ',', '.') }}</p>

                {{-- KONTROL JUMLAH (Hanya Muncul di Mode Beli) --}}
                <div class="quantity-control action-mode-buy">
                    <button onclick="changeQty(this, -1)">-</button>
                    <input type="text" value="0" readonly>
                    <button onclick="changeQty(this, 1)">+</button>
                </div>

                {{-- ========== 1. MODE BELI (DEFAULT) ========== --}}
                <div class="action-mode-buy">
                    <form action="{{ route('detail-transaksi.store') }}" method="POST" onsubmit="return validateQty(this)">
                        @csrf
                        <input type="hidden" name="id_transaksi" value="2">
                        <input type="hidden" name="id_produk" value="{{ $g->idGear }}">
                        <input type="hidden" name="jenis_barang" value="gear"> 
                        <input type="hidden" class="qty-input" name="qty" value="0">
                        <input type="hidden" name="subtotal" value="0">
                        <button class="buy-btn">Beli</button>
                    </form>
                </div>

                {{-- ========== 2. MODE ADMIN (GABUNGAN EDIT & HAPUS) ========== --}}
                <div class="action-mode-admin">
                    <div class="admin-buttons-container">
                        
                        {{-- Tombol Edit --}}
                        <a href="{{ route('produk.edit', ['kategori' => 'gear', 'id' => $g->idGear]) }}" class="btn-edit-card">
                            ✏ Edit
                        </a>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('produk.destroy', ['kategori' => 'gear', 'id' => $g->idGear]) }}" method="POST" 
                              onsubmit="return confirm('Yakin ingin menghapus {{ $g->namaGear }}?');" style="flex:1;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete-card">
                                🗑 Hapus
                            </button>
                        </form>

                    </div>
                </div>
                {{-- END MODE ADMIN --}}

            </div>
            @endforeach
        @endif

    </div>
</div>

{{-- JAVASCRIPT --}}
<script>
// 1. Script Dropdown
document.getElementById("menuBtn").onclick = function() {
    let menu = document.getElementById("menuDropdown");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
};

// 2. Script Search
document.getElementById("searchInput").addEventListener("keyup", function() {
    let filter = this.value.toLowerCase();
    let cards = document.getElementsByClassName("product-card");
    for (let card of cards) {
        let name = card.querySelector(".product-name").innerText.toLowerCase();
        card.style.display = name.includes(filter) ? "" : "none";
    }
});

// 3. SCRIPT MODE SWITCHER (SIMPEL: HANYA BELI atau ADMIN)
function switchMode(mode) {
    let buyElements = document.querySelectorAll('.action-mode-buy');
    let adminElements = document.querySelectorAll('.action-mode-admin');
    
    let menuDropdown = document.getElementById("menuDropdown");
    let banner = document.getElementById("modeBanner");
    let cancelBtns = document.querySelectorAll('.cancel-mode-btn');

    // Reset Tampilan
    buyElements.forEach(el => el.style.display = 'none');
    adminElements.forEach(el => el.style.display = 'none');
    banner.style.display = 'none';
    cancelBtns.forEach(el => el.style.display = 'none');

    if (mode === 'buy') {
        // Mode Beli (Default)
        buyElements.forEach(el => el.style.display = 'block');
        menuDropdown.style.display = 'none';

    } else if (mode === 'admin') {
        // Mode Admin (Edit & Hapus Muncul Bersamaan)
        adminElements.forEach(el => el.style.display = 'block');
        
        banner.style.display = 'block';
        cancelBtns.forEach(el => el.style.display = 'block');
        menuDropdown.style.display = 'none';
    }
}

// 4. Script Qty
function changeQty(button, delta) {
    const input = button.parentElement.querySelector('input[type="text"]');
    const form = button.closest('.product-card').querySelector('form');
    
    let value = parseInt(input.value);
    value = Math.max(0, value + delta);
    input.value = value;
    form.querySelector('.qty-input').value = value;

    const priceText = button.closest('.product-card').querySelector('.price').innerText;
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