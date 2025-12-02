<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dataPegawai.css') }}">
</head>
<body>

<header>
    <div class="back-container">
        <a href="{{ route('home') }}" class="back-btn">⬅ Kembali</a>
    </div>

    <h1>Data Pegawai</h1>

    @if(Auth::check() && Auth::user()->role == 'admin')
    <button class="header-menu-btn" onclick="toggleGlobalMenu()">⋮</button>

    <div class="global-dropdown" id="globalMenu">
        <a href="{{ route('pegawai.create') }}" class="menu-item">
    <span class="icon-plus">✚</span> Tambah Pegawai
</a>
        
        <button class="menu-item" onclick="toggleAdminMode()">
            <span class="icon-gear">⚙</span> Atur Pegawai (Edit & Hapus)
        </button>
        
        <hr style="border: 0; border-top: 1px solid #eee; margin: 5px 0;">
        
        <button class="menu-item text-danger" onclick="exitAdminMode()">
            <span class="icon-close">✖</span> Keluar Mode Admin
        </button>
    </div>
    @endif
</header>

<main class="pegawai-container" id="pegawaiList">

    @foreach ($pegawai as $p)
    <div class="pegawai-card">
        <div class="foto">
            <img src="{{ asset($p['foto']) }}" alt="{{ $p['nama'] }}">
        </div>

        <div class="info">
            <h2>{{ $p['nama'] }}</h2>
            <p><strong>Jabatan:</strong> {{ $p['jabatan'] }}</p>
            <p><strong>Email:</strong> {{ $p['email'] }}</p>

            <!-- Tombol Aksi -->
@if(Auth::check() && Auth::user()->role == 'admin')
<div class="card-actions">
    
    <!-- PERUBAHAN DI SINI: Gunakan tag <a> ke route edit -->
    <a href="{{ route('pegawai.edit', $p['id']) }}" class="btn-card btn-edit" style="text-decoration:none; text-align:center;">
        ✏️ Edit
    </a>
    
    <form action="{{ route('pegawai.destroy', $p['id']) }}" method="POST" style="display:inline;">
        @csrf @method('DELETE')
        <button class="btn-card btn-hapus" onclick="return confirm('Hapus {{ $p['nama'] }}?')">🗑️ Hapus</button>
    </form>
</div>
@endif

<!-- ... -->
        </div>
    </div>
    @endforeach

</main>

<script>
    // 1. Toggle Dropdown Menu Header
    function toggleGlobalMenu() {
        document.getElementById('globalMenu').classList.toggle('active');
    }

    // 2. Masuk Mode Admin (Munculkan tombol di kartu)
    function toggleAdminMode() {
        document.getElementById('pegawaiList').classList.add('show-admin-mode');
        // Tutup menu dropdown setelah diklik
        document.getElementById('globalMenu').classList.remove('active');
    }

    // 3. Keluar Mode Admin (Sembunyikan tombol di kartu)
    function exitAdminMode() {
        document.getElementById('pegawaiList').classList.remove('show-admin-mode');
        document.getElementById('globalMenu').classList.remove('active');
    }
</script>

</body>
</html>