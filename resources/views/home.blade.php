<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXERA MOTOR - Home</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <style>
        /* ======== PANAH SLIDESHOW ======== */
        .slide-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 28px;
            background: rgba(0,0,0,0.35);
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 50%;
            z-index: 20;
        }

        /* Panah tidak terlalu pinggir, dekat gambar */
        #prevBtn { left: 5px; }    /* sebelumnya -35px → sekarang 5px agar terlihat */
        #nextBtn { right: 5px; }   /* sebelumnya -35px → sekarang 5px */

        /* Area gambar tetap seperti tampilan awal */
        .hero-image {
            position: relative;
        }
    </style>
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
            <!-- Panah kiri -->
            <button id="prevBtn" class="slide-btn">&#10094;</button>

            <!-- Gambar -->
            <img id="heroSlide" src="{{ asset('img/home1.jpg') }}" alt="Gambar">

            <!-- Panah kanan -->
            <button id="nextBtn" class="slide-btn">&#10095;</button>
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


<!-- ========== SCRIPT SLIDESHOW ========== -->
<script>
    let index = 0;
    const images = [
        "{{ asset('img/home1.jpg') }}",
        "{{ asset('img/home2.jpg') }}",
        "{{ asset('img/home3.jpg') }}"
    ];

    function showImage(i) {
        index = (i + images.length) % images.length;
        document.getElementById("heroSlide").src = images[index];
    }

    // Auto slide
    setInterval(() => showImage(index + 1), 3000);

    // Manual slide
    document.getElementById("prevBtn").onclick = () => showImage(index - 1);
    document.getElementById("nextBtn").onclick = () => showImage(index + 1);
</script>

</body>
</html>