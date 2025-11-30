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
        #prevBtn { left: 5px; }    
        #nextBtn { right: 5px; }   

        /* Area gambar tetap seperti tampilan awal */
        .hero-image {
            position: relative;
        }
    </style>
</head>
<body>

<header class="navbar">
    <div class="logo">
        <img src="{{ asset('img/bike.png') }}" alt="Logo Motor" class="logo-icon">
        <div class="logo-text">
            <h1>AXERA MOTOR</h1>
            <p>Bengkel Servis Motor</p>
        </div>
    </div>

    <nav class="nav-links">
        <a href="{{ route('service.form') }}">Form Service</a>
        <a href="{{ route('pegawai.index') }}">Data Pegawai</a>

        <a href="{{ route('cart.show') }}" class="cart-link" style="position: relative; font-size: 20px; text-decoration: none;">
            🛒
            <span class="cart-count" 
                style="
                    position: absolute;
                    top: -8px;
                    right: -10px;
                    background: red;
                    color: white;
                    padding: 1px 6px;
                    border-radius: 50%;
                    font-size: 11px;
                ">
                {{-- PERBAIKAN: Hitung langsung dari database jika login --}}
                @auth
                    {{ \App\Models\Cart::where('user_id', Auth::id())->count() }}
                @else
                    0
                @endauth
            </span>
        </a>
    </nav>

    <div class="user-section">
        <div class="user-icon">👤</div>
        <div class="user-info">
            <p class="role">{{ Auth::user()->username ?? 'Tamu' }}</p>
            
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout" style="cursor: pointer;">Log out</button>
                </form>
            @else
                <a href="{{ route('login.form') }}" style="color: white; font-size: 14px;">Log in</a>
            @endauth
        </div>
    </div>
</header>



<section class="hero">
    <div class="hero-content">

        <div class="hero-text">
            <h1>Nikmati hematnya servis kendaraan!</h1>
            <p>Jelajahi promo dari bengkel terdekat dan booking sekarang!</p>
        </div>

        <div class="hero-image">
            <button id="prevBtn" class="slide-btn">&#10094;</button>

            <img id="heroSlide" src="{{ asset('img/home1.jpg') }}" alt="Gambar" style="width: 100%; border-radius: 10px;">

            <button id="nextBtn" class="slide-btn">&#10095;</button>
        </div>

    </div>
</section>


<main>
    <h2 class="section-title">Servis</h2>

    <div class="service-container">
        <a href="{{ route('gear') }}" class="service-box">
            <img src="{{ asset('img/gear.png') }}" alt="Gear / Mesin Motor">
            <p>Gear</p>
        </a>

        <a href="{{ route('oli') }}" class="service-box">
            {{-- Menggunakan asset() untuk konsistensi --}}
            <img src="{{ asset('img/oli4.png') }}" alt="Oli Mesin / Pelumas" onerror="this.src='https://cdn-icons-png.flaticon.com/512/798/798867.png'">
            <p>Oli</p>
        </a>

        <a href="{{ route('ban') }}" class="service-box">
            <img src="{{ asset('img/ban.png') }}" alt="Ban / Roda">
            <p>Ban</p>
        </a>

        {{-- Perbaikan link sparepart --}}
        <a href="{{ route('sparepart.index') }}" class="service-box">
            <img src="{{ asset('img/crankshaft.png') }}" alt="Sparepart / Perlengkapan">
            <p>Sparepart</p>
        </a>
    </div>

</main>


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