<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXERA MOTOR - Home</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <!-- Menggunakan Font Poppins agar lebih modern -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome untuk Icon Footer -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
<<<<<<< HEAD

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

=======
</head>
<body>

<!-- HEADER -->
<header class="navbar">
    <div class="nav-container">
        
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('img/bike.png') }}" alt="Logo Motor" class="logo-icon">
            <div class="logo-text">
                <h1>AXERA MOTOR</h1>
                <p>Bengkel Servis & Sparepart</p>
            </div>
        </a>

        <!-- Search Bar -->
        <div class="search-wrapper">
            <input type="text" class="search-bar" placeholder="Cari sparepart, oli, atau layanan...">
            <button class="search-btn"><i class="fas fa-search"></i></button>
>>>>>>> 91af1fce5943a10637336d5c9feafcf8d5de5154
        </div>

        <!-- Menu Kanan -->
        <nav class="nav-links">
            <a href="{{ route('service.form') }}" class="menu-item">Booking Servis</a>
            <a href="{{ route('pegawai.index') }}" class="menu-item">Info Bengkel</a>

            <!-- Cart -->
            <a href="{{ route('cart.show') }}" class="cart-wrapper" title="Keranjang Belanja">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count">
                    @auth
                        {{ \App\Models\Cart::where('user_id', Auth::id())->count() }}
                    @else
                        0
                    @endauth
                </span>
            </a>

            <!-- User Auth -->
            <div class="user-section">
                @auth
                    <i class="fas fa-user-circle" style="font-size: 18px; color: white;"></i>
                    <span style="font-size:13px; color: white; font-weight: 500;">{{ Str::limit(Auth::user()->username, 10) }}</span>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline; margin-left: 5px;">
                        @csrf
                        <button type="submit" class="logout-btn">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login.form') }}" style="color: white; font-weight:bold; font-size: 14px;">Masuk / Daftar</a>
                @endauth
            </div>
        </nav>
    </div>
</header>

<<<<<<< HEAD
<!-- ========================= HERO ========================= -->
=======
<!-- HERO SECTION -->
>>>>>>> 91af1fce5943a10637336d5c9feafcf8d5de5154
<section class="hero">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Solusi Terbaik untuk<br><span class="highlight">Motor Kesayangan Anda!</span></h1>
            <p>Dapatkan suku cadang orisinil dan layanan servis profesional dengan harga terjangkau. Jangan lewatkan promo spesial hari ini.</p>
            
            <a href="{{ route('service.form') }}" class="cta-button">
                <i class="fas fa-calendar-check" style="margin-right:8px;"></i> Booking Servis Sekarang
            </a>
        </div>

        <div class="hero-image">
<<<<<<< HEAD
            <button id="prevBtn" class="slide-btn">&#10094;</button>

            <img id="heroSlide" src="{{ asset('img/home1.jpg') }}" alt="Gambar">

            <button id="nextBtn" class="slide-btn">&#10095;</button>
=======
            <button id="prevBtn" class="slide-btn"><i class="fas fa-chevron-left"></i></button>
            <img id="heroSlide" src="{{ asset('img/home1.jpg') }}" alt="Banner Promo">
            <button id="nextBtn" class="slide-btn"><i class="fas fa-chevron-right"></i></button>
>>>>>>> 91af1fce5943a10637336d5c9feafcf8d5de5154
        </div>
    </div>
</section>

<<<<<<< HEAD
<!-- ========================= SERVICES ========================= -->
=======
<!-- MAIN MENU / KATEGORI -->
>>>>>>> 91af1fce5943a10637336d5c9feafcf8d5de5154
<main>
    <div class="section-header">
        <h2 class="section-title">KATEGORI PRODUK & LAYANAN</h2>
    </div>

    <div class="service-container">
        <a href="{{ route('gear') }}" class="service-box">
<<<<<<< HEAD
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
=======
            <img src="{{ asset('img/gear.png') }}" alt="Gear">
            <p>Gear Set</p>
        </a>

        <a href="{{ route('oli') }}" class="service-box">
            <img src="{{ asset('img/oli4.png') }}" alt="Oli" onerror="this.src='https://cdn-icons-png.flaticon.com/512/798/798867.png'">
            <p>Oli Mesin</p>
        </a>

        <a href="{{ route('ban') }}" class="service-box">
            <img src="{{ asset('img/ban.png') }}" alt="Ban">
            <p>Ban Motor</p>
        </a>

        <a href="{{ route('sparepart.index') }}" class="service-box">
            <img src="{{ asset('img/crankshaft.png') }}" alt="Sparepart">
            <p>Sparepart Lainnya</p>
>>>>>>> 91af1fce5943a10637336d5c9feafcf8d5de5154
        </a>
    </div>
</main>

<<<<<<< HEAD
<!-- ========================= REVIEW SECTION ========================= -->
<section class="review-section">
    <h2 class="review-title">Apa Kata Pelanggan?</h2>
=======
<!-- FOOTER -->
<footer>
    <div class="footer-content">
        <!-- Kolom 1 -->
        <div class="footer-col">
            <h3>Layanan Pelanggan</h3>
            <ul>
                <li><a href="#">Bantuan</a></li>
                <li><a href="#">Cara Pembelian</a></li>
                <li><a href="#">Lacak Pesanan</a></li>
                <li><a href="#">Garansi Servis</a></li>
                <li><a href="#">Hubungi Kami</a></li>
            </ul>
        </div>

        <!-- Kolom 2 -->
        <div class="footer-col">
            <h3>Jelajahi Axera</h3>
            <ul>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Karir</a></li>
                <li><a href="#">Kebijakan Privasi</a></li>
                <li><a href="#">Blog Otomotif</a></li>
                <li><a href="#">Mitra Bengkel</a></li>
            </ul>
        </div>

        <!-- Kolom 3 -->
        <div class="footer-col">
            <h3>Metode Pembayaran</h3>
            <div class="footer-logos">
                <div class="logo-box" title="BCA"><img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" alt="BCA"></div>
                <div class="logo-box" title="BNI"><img src="https://upload.wikimedia.org/wikipedia/id/thumb/5/55/BNI_logo.svg/1200px-BNI_logo.svg.png" alt="BNI"></div>
                <div class="logo-box" title="BRI"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/BANK_BRI_logo.svg/1200px-BANK_BRI_logo.svg.png" alt="BRI"></div>
                <div class="logo-box" title="Mandiri"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Bank_Mandiri_logo_2016.svg/1200px-Bank_Mandiri_logo_2016.svg.png" alt="Mandiri"></div>
                <div class="logo-box qris"><span>QRIS</span></div>
                <div class="logo-box" title="Cash"><i class="fas fa-money-bill-wave" style="color:#28a745;"></i></div>
            </div>
        </div>

        <!-- Kolom 4 -->
        <div class="footer-col">
            <h3>Ikuti Kami</h3>
            <ul class="social-links">
                <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                <li><a href="#"><i class="fab fa-tiktok"></i> TikTok</a></li>
                <li><a href="#"><i class="fab fa-youtube"></i> YouTube</a></li>
            </ul>
            <br>
            <h3>Keamanan</h3>
            <div style="display:flex; align-items:center; gap:10px;">
                <i class="fas fa-shield-alt" style="font-size:24px; color:var(--primary-orange);"></i>
                <span style="font-size:12px; line-height:1.2; color:#444;">Transaksi Aman<br>& Terpercaya</span>
            </div>
        </div>
    </div>

    <div class="copyright">
        &copy; {{ date('Y') }} <strong>Axera Motor</strong>. Seluruh Hak Cipta Dilindungi. <br>
        <span style="font-size: 11px;">Dibuat dengan ❤️ untuk kenyamanan berkendara Anda.</span>
    </div>
</footer>
>>>>>>> 91af1fce5943a10637336d5c9feafcf8d5de5154

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

<<<<<<< HEAD
    setInterval(() => showImage(index + 1), 3000);
=======
    // Auto slide
    setInterval(() => showImage(index + 1), 5000); 
>>>>>>> 91af1fce5943a10637336d5c9feafcf8d5de5154

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
