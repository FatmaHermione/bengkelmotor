<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXERA MOTOR - Home</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

    <!-- ========== NAVBAR ========== -->
<header class="navbar">
    <div class="logo">
        <img src="{{ asset('img/bike.png') }}" alt="Logo Motor" class="logo-icon">
        <div class="logo-text">
            <h1>AXERA MOTOR</h1>
            <p>Bengkel Servis Motor</p>
        </div>
    </div>

    <!-- Tambahkan menu navigasi -->
    <nav class="nav-links">
<nav class="nav-links">
    <a href="{{ route('service.form') }}">Form Service</a>
    <a href="{{ route('pegawai.index') }}">Data Pegawai</a>
</nav>

    </nav>

    <div class="user-section">
        <div class="user-icon">👤</div>
        <div class="user-info">
            <p class="role">{{ Auth::user()->username ?? 'Kasir' }}</p>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout">Log out</button>
            </form>
        </div>
    </div>
</header>


    <!-- ========== HERO SECTION ========== -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Nikmati hematnya servis kendaraan!</h1>
                <p>Jelajahi promo dari bengkel terdekat dan booking sekarang!</p>
            </div>
            <div class="hero-image">
                <img src="{{ asset('img/hero-motor.png') }}" alt=" ">
            </div>
        </div>
    </section>

    <!-- ========== MAIN CONTENT ========== -->
    <main>
        <h2 class="section-title">Servis</h2>

        <div class="service-container">
            <a href="{{ route('gear') }}" class="service-box">
                <img src="{{ asset('img/gear.png') }}" alt="Gear / Mesin Motor">
                <p>Gear</p>
            </a>

            <a href="{{ route('oli') }}" class="service-box">
                <img src="https://cdn-icons-png.flaticon.com/512/798/798867.png" alt="Oli Mesin / Pelumas">
                <p>Oli</p>
            </a>

            <a href="{{ route('ban') }}" class="service-box">
                <img src="{{ asset('img/ban.png') }}" alt="Ban / Roda">
                <p>Ban</p>
            </a>

            <a href="{{ route('sparepart.index') }}" class="service-box">
                <img src="{{ asset('img/crankshaft.png') }}" alt="Sparepart / Perlengkapan">
                <p>Sparepart</p>
            </a>
        </div>

    </main>

</body>
</html>
