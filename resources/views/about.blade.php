<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Axera Motor</title>

    <style>
        /* ================= NAVBAR ================= */
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

        /* ================= ABOUT SECTION ================= */
        .about-section {
            padding: 60px 6%;
            background: #fff5e6;
            border-top: 2px solid #ff9900;
            text-align: center;
        }

        .about-section h1 {
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .about-section {
        padding: 60px 6%;
        background: linear-gradient(to bottom, #ff9933, #ffb566);
        border-top: 2px solid #ff9900;
        text-align: center;
    }


        /* ================= FOOTER ================= */
        .footer-axera {
            background: #1e1e1e;
            color: white;
            border-top: 1px solid #333;
            padding: 50px 6%;
            margin-top: 0;
        }

        .footer-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 30px;
            text-align: left;
        }

        .footer-col {
            flex: 1 1 250px;
        }

        .footer-col h2 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .footer-col h3 {
            font-size: 18px;
            margin-top: 15px;
            margin-bottom: 10px;
        }

        .footer-col p {
            margin: 5px 0;
            font-size: 16px;
        }

        .footer-social {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .footer-social div {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-social img {
            width: 20px;
            height: auto;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 900px) {
            .footer-row {
                flex-direction: column;
                text-align: center;
            }

            .footer-col {
                margin-bottom: 20px;
            }

            .nav-links {
                gap: 20px;
            }
        }

    </style>
</head>
<body>

<!-- NAVBAR PUTIH SUDAH DIGABUNG -->
<header class="navbar">
    <div class="logo">
        <img src="{{ asset('img/bike.png') }}" class="logo-icon">
        <div class="logo-text">
            <h1>AXERA MOTOR</h1>
            <p>Bengkel Servis Motor</p>
        </div>
    </div>

    <nav class="nav-links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('service.form') }}">Form Service</a>
        <a href="{{ route('pegawai.index') }}">Data Pegawai</a>
        <a href="{{ route('about.index') }}">Tentang Bengkel Kami</a>
    </nav>

    <div class="nav-user">
        <img src="{{ asset('img/user.png') }}" class="user-icon">
    </div>
</header>

<!-- ABOUT SECTION -->
<main class="about-section">
    <h1>Tentang Bengkel Kami</h1>
    <p>Axera Motor adalah bengkel servis motor terpercaya dengan mekanik profesional, pengalaman puluhan tahun, dan layanan cepat serta ramah untuk semua jenis motor.</p>
    <p>Kami menyediakan layanan servis lengkap mulai dari ganti oli, perbaikan gear, ban, hingga sparepart motor asli dan berkualitas. Kepuasan pelanggan adalah prioritas utama kami, sehingga setiap motor yang masuk dijaga kualitasnya dengan standar tinggi.</p>
    <p>Selain itu, Axera Motor juga berkomitmen pada inovasi layanan. Kami selalu mengikuti teknologi terbaru di dunia otomotif agar motor pelanggan tetap prima dan aman dikendarai. Pelanggan bisa menikmati layanan booking online, promo menarik, dan konsultasi gratis mengenai perawatan motor.</p>
    <p>Visi kami adalah menjadi bengkel pilihan utama di kota Surabaya dengan pelayanan profesional, harga transparan, dan pengalaman servis yang memuaskan setiap pelanggan.</p>
</main>

<!-- FOOTER -->
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

            <h3>Sosial Media</h3>
            <div class="footer-social">
                <div><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png"> Axera Motor</div>
                <div><img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png"> Axera Motor</div>
                <div><img src="https://cdn-icons-png.flaticon.com/512/733/733585.png"> 0812-3456-7890</div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
