<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link rel="stylesheet" href="{{ asset('css/dataPegawai.css') }}">

    <!-- NAVBAR STYLE -->
    <style>
        .navbar {
            width: 100%;
            background: white;
            padding: 10px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #3f2727; /* coklat tua seperti gambar */
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            width: 40px;
            height: auto;
        }

        .logo h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 800;
        }

        .logo p {
            margin: 0;
            font-size: 12px;
            color: #444;
        }

        .nav-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .nav-links {
            display: flex;
            gap: 40px;
        }

        .nav-links a {
            text-decoration: none;
            color: #000;
            font-weight: 600;
            font-size: 16px;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: #ff7b00;
        }
    </style>
</head>
<body>

<!-- ================= NAVBAR ================= -->
<header class="navbar">

    <!-- Logo kiri -->
    <div class="logo">
        <img src="{{ asset('img/bike.png') }}" class="logo-icon">
        <div class="logo-text">
            <h1>AXERA MOTOR</h1>
            <p>Bengkel Servis Motor</p>
        </div>
    </div>

    <!-- Menu tengah -->
    <div class="nav-center">
        <nav class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('service.form') }}">Form Service</a>
            <a href="{{ route('pegawai.index') }}" class="active">Data Pegawai</a>
            <a href="{{ route('about.index') }}">Tentang Bengkel Kami</a>
        </nav>
    </div>

</header>
<!-- ================= END NAVBAR ================= -->
<h1 class="judul-halaman">Data Pegawai</h1>

<!-- ================= ISI HALAMAN TANPA HEADER ORANYE ================= -->
<main class="pegawai-container">

    @foreach ($pegawai as $p)
    <div class="pegawai-card">

        <div class="foto">
            <img src="{{ asset($p['foto']) }}" alt="{{ $p['nama'] }}">
        </div>

        <div class="info">
            <h2>{{ $p['nama'] }}</h2>
            <p><strong>Jabatan:</strong> {{ $p['jabatan'] }}</p>
            <p><strong>Email:</strong> {{ $p['email'] }}</p>

            <div class="aksi">
                <button class="btn-edit" onclick="alert('Fitur edit belum dibuat (statis).')">Edit</button>
                <button class="btn-hapus" onclick="confirm('Yakin hapus?') ? alert('Dihapus (statis).') : null">Hapus</button>
            </div>
        </div>

    </div>
    @endforeach

</main>

</body>
</html>
