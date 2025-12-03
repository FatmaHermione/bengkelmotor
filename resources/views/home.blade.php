<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXERA MOTOR - Home</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

<style>

/* ============================================================
   NAVBAR
=============================================================== */
.navbar {
    width: 100%;
    background: #ffffff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 14px 6%;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    position: sticky;
    top: 0;
    z-index: 50;
}

.logo {
    display: flex;
    align-items: center;
    gap: 12px;
}

.logo-icon { width: 45px; }

.logo-text h1 {
    margin: 0;
    font-size: 20px;
    font-weight: 800;
    color: #222;
}

.logo-text p {
    margin: 0;
    font-size: 12px;
    color: #444;
}

.nav-links a {
    margin-left: 22px;
    font-weight: 600;
    color: #222;
    font-size: 15px;
    text-decoration: none;
}

.nav-links a:hover { color: #ff6600; }

/* TENTANG BENGKEL NAVBAR */
.nav-links a.about-nav {
    background-color: #ff6600;
    color: white;
    padding: 6px 12px;
    border-radius: 8px;
    transition: 0.3s;
}

.nav-links a.about-nav:hover {
    background-color: #ff8533;
    color: white;
}

/* USER DROPDOWN */
.user-dropdown {
    position: relative;
    cursor: pointer;
}

.user-icon {
    font-size: 26px;
    color: #333;
}

.dropdown-menu {
    position: absolute;
    right: 0;
    top: 45px;
    width: 180px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    display: none;
    opacity: 0;
    transform: translateY(-5px);
    transition: .25s ease;
    padding: 10px 0;
}

.dropdown-menu.active {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

.dropdown-menu a,
.dropdown-menu form button {
    width: 100%;
    display: flex;
    align-items: center;
    padding: 12px 18px;
    gap: 10px;
    background: none;
    border: none;
    text-align: left;
    font-size: 15px;
    color: #222;
    cursor: pointer;
}

.dropdown-menu a:hover,
.dropdown-menu form button:hover {
    background: #ffe5cc;
}

.dropdown-menu img {
    width: 20px;
}

/* ============================================================
   HERO SECTION — ORANGE PREMIUM
=============================================================== */
.hero {
    width: 100%;
    padding: 70px 6%;
    background: linear-gradient(135deg, #ff7b00, #ff9a3c, #ffb067);
    color: white;
}

.hero-content {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    align-items: center;
    gap: 40px;
}

.hero-text h1 {
    font-size: 40px;
    font-weight: 800;
    margin-bottom: 14px;
}

.hero-text p {
    font-size: 18px;
    opacity: .9;
}

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
#prevBtn { left: 5px; }
#nextBtn { right: 5px; }

.hero-image { position: relative; }

.hero-image img {
    width: 100%;
    border-radius: 14px;
    box-shadow: 0 18px 30px rgba(0,0,0,0.25);
}

/* ============================================================
   SERVICE CARDS
=============================================================== */
.section-title {
    font-size: 26px;
    font-weight: 700;
    margin: 40px 6% 20px;
}

.service-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    padding: 10px 6% 40px;
    gap: 25px;
}

.service-box {
    background: white;
    padding: 25px;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    transition: .25s ease;
    text-decoration: none;
    color: #000;
}

.service-box:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 26px rgba(0,0,0,0.12);
}

.service-box img { width: 70px; margin-bottom: 15px; }

.service-box p {
    font-size: 16px;
    font-weight: 600;
}

/* ============================================================
   ABOUT SECTION
=============================================================== */
.about-section {
    padding: 60px 6%;
    background: #fff5e6;
    border-top: 2px solid #ff9900;
}

.about-section h2 {
    font-size: 30px;
    font-weight: 800;
    margin-bottom: 10px;
}

.about-section p {
    font-size: 17px;
    line-height: 1.6;
    color: #444;
}

/* ============================================================
   REVIEW SECTION (DARK)
=============================================================== */
.review-section {
    background: #1e1e1e;
    padding: 60px 6%;
    color: white;
}

.review-title {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 25px;
}

.review-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.review-box {
    background: #2a2a2a;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 5px 18px rgba(0,0,0,0.4);
}

.review-box h4 {
    margin: 0;
    font-size: 18px;
    font-weight: 700;
}

.review-box p {
    margin-top: 8px;
    line-height: 1.5;
}

/* STAR RATING */
.review-box .rating {
    color: #ffcc00;
    margin: 6px 0;
}

/* ============================================================
   FOOTER
=============================================================== */
.footer-axera {
    background: #1e1e1e; /* sama seperti review-section */
    color: white;
    border-top: 1px solid #1e1e1e;
    padding: 50px 6%;
    margin-top: 0;
}

.footer-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
}

.footer-col h2 { font-size: 26px; font-weight: 700; }

.footer-col h3 { font-size: 18px; margin-top: 10px; }

.footer-social div {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 6px;
}

.footer-social img { width: 22px; }

/* ============================================================
   RESPONSIVE MODE
=============================================================== */
@media (max-width: 900px) {
    .hero-content { grid-template-columns: 1fr; text-align: center; }
    .service-container { grid-template-columns: repeat(2, 1fr); }
    .review-container { grid-template-columns: 1fr; }
}

@media (max-width: 600px) {
    .service-container { grid-template-columns: 1fr; }
}
</style>

</head>
<body>

<!-- ========================= NAVBAR ========================= -->
<header class="navbar">
    <div class="logo">
        <img src="{{ asset('img/bike.png') }}" class="logo-icon">
        <div class="logo-text">
            <h1>AXERA MOTOR</h1>
            <p>Bengkel Servis Motor</p>
        </div>
    </div>

    <nav class="nav-links">
        <a href="{{ route('service.form') }}">Form Service</a>
        <a href="{{ route('pegawai.index') }}">Data Pegawai</a>
        <a href="{{ route('about.index') }}">Tentang Bengkel Kami</a>
        
    </nav>

    <div class="user-dropdown" id="userDropdownBtn">
        <div class="user-icon">👤</div>

        <div class="dropdown-menu" id="dropdownMenu">

            <a>
                <img src="https://cdn-icons-png.flaticon.com/512/456/456212.png">
                {{ Auth::user()->username ?? 'Tamu' }}
            </a>

            <a href="{{ route('cart.show') }}">
                <img src="https://cdn-icons-png.flaticon.com/512/3144/3144456.png">
                Keranjang ({{ Auth::check() ? \App\Models\Cart::where('user_id', Auth::id())->count() : 0 }})
            </a>

            @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">
                    <img src="https://cdn-icons-png.flaticon.com/512/1828/1828479.png">
                    Logout
                </button>
            </form>
            @else
            <a href="{{ route('login.form') }}">
                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828395.png">
                Login
            </a>
            @endauth

        </div>
    </div>
</header>

<!-- ========================= HERO ========================= -->
<section class="hero">
    <div class="hero-content">

        <div class="hero-text">
            <h1>Nikmati hematnya servis kendaraan!</h1>
            <p>Jelajahi promo dari bengkel terdekat dan booking sekarang!</p>
        </div>

        <div class="hero-image">
            <button id="prevBtn" class="slide-btn">&#10094;</button>

            <img id="heroSlide" src="{{ asset('img/home1.jpg') }}" alt="Gambar">

            <button id="nextBtn" class="slide-btn">&#10095;</button>
        </div>

    </div>
</section>

<!-- ========================= SERVICES ========================= -->
<main>
    <h2 class="section-title">Servis</h2>

    <div class="service-container">
        <a href="{{ route('gear') }}" class="service-box">
            <img src="{{ asset('img/gear.png') }}"><p>Gear</p>
        </a>

        <a href="{{ route('oli') }}" class="service-box">
            <img src="{{ asset('img/oli4.png') }}"><p>Oli</p>
        </a>

        <a href="{{ route('ban') }}" class="service-box">
            <img src="{{ asset('img/ban.png') }}"><p>Ban</p>
        </a>

        <a href="{{ route('sparepart.index') }}" class="service-box">
            <img src="{{ asset('img/crankshaft.png') }}"><p>Sparepart</p>
        </a>
    </div>
</main>

<!-- ========================= REVIEW SECTION ========================= -->
<section class="review-section">
    <h2 class="review-title">Apa Kata Pelanggan?</h2>

    <div class="review-container">
        <div class="review-box">
            <h4>Fajar R.</h4>
            <div class="rating">⭐⭐⭐⭐⭐</div>
            <p>“Pelayanan cepat, harga terjangkau, dan mekaniknya ramah. Sangat recommended!”</p>
        </div>

        <div class="review-box">
            <h4>Rani S.</h4>
            <div class="rating">⭐⭐⭐⭐⭐</div>
            <p>“Pertama kali ke sini dan langsung suka. Hasil servis memuaskan!”</p>
        </div>

        <div class="review-box">
            <h4>Dimas W.</h4>
            <div class="rating">⭐⭐⭐⭐⭐</div>
            <p>“Tempatnya nyaman dan profesional. Pasti balik lagi kalau servis motor.”</p>
        </div>
    </div>
</section>

<!-- ========================= FOOTER ========================= -->
<footer class="footer-axera">
    <div class="footer-row">

        <div class="footer-col">
            <h2>Axera Motor</h2>
            <p>Bengkel servis motor terpercaya dengan mekanik profesional dan harga terjangkau.</p>
        </div>

        <div class="footer-col">
            <h3>Hubungi Kami</h3>
            <p>📍 Jl. Ahmad Yani No. 123, Surabaya</p>
            <p>📞 0812-3456-7890</p>
            <p>✉️ axeramotor@gmail.com</p>

            <h3 style="margin-top:15px;">Sosial Media</h3>
            <div class="footer-social">
                <div><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png"> Axera Motor</div>
                <div><img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png"> Axera Motor</div>
                <div><img src="https://cdn-icons-png.flaticon.com/512/733/733585.png"> 0812-3456-7890</div>
            </div>
        </div>

    </div>
</footer>

<!-- ========================= JS ========================= -->
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

    setInterval(() => showImage(index + 1), 3000);

    document.getElementById("prevBtn").onclick = () => showImage(index - 1);
    document.getElementById("nextBtn").onclick = () => showImage(index + 1);

    const dropdownBtn = document.getElementById("userDropdownBtn");
    const dropdownMenu = document.getElementById("dropdownMenu");

    dropdownBtn.addEventListener("click", () => {
        dropdownMenu.classList.toggle("active");
    });

    document.addEventListener("click", (e) => {
        if (!dropdownBtn.contains(e.target)) {
            dropdownMenu.classList.remove("active");
        }
    });
</script>

</body>
</html>
