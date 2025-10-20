<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXERA MOTOR - Oli</title>
    <link rel="stylesheet" href="home.css">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #ff9933;
            padding: 10px 20px;
            color: #000;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .logo-text h1 {
            margin: 0;
            font-size: 20px;
        }

        .page-title {
            font-size: 28px;
            font-weight: bold;
        }

        .back-container {
            margin: 20px;
        }

        .back-btn {
            text-decoration: none;
            background-color: #ff9933;
            color: white;
            padding: 8px 15px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }

        .back-btn:hover {
            background-color: #e67e22;
        }

        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 20px;
            padding: 0 20px 40px;
        }

        .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            text-align: center;
            padding: 10px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            width: 100%;
            height: 150px;
            object-fit: contain;
        }

        .product-name {
            font-weight: bold;
            margin: 10px 0 5px;
        }

        .price {
            color: #e67e22;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="navbar">
        <div class="logo">
            <img src="bike.png" alt="Logo Motor" class="logo-icon">
            <div class="logo-text">
                <h1>AXERA MOTOR</h1>
                <p>Bengkel Servis Motor</p>
            </div>
        </div>
        <h2 class="page-title">OLI</h2>
    </header>

    <!-- Tombol kembali -->
    <div class="back-container">
        <a href="{{ route('home') }}" class="back-btn">⬅ Kembali</a>
    </div>

    <!-- Konten produk -->
    <main class="product-container">
        <div class="product-card">
            <img src="oli 1.png" alt="Oli 1">
            <p class="product-name">OLI MOTOR SHELL ADVANCE AX7 SCOOTER 10W-30 (0.8L)</p>
            <p class="price">Rp64.000</p>
        </div>

        <div class="product-card">
            <img src="oli 2.png" alt="Oli 2">
            <p class="product-name">MOTUL GP POWER 10W-40 4T MANUAL (1L)</p>
            <p class="price">Rp74.000</p>
        </div>

        <div class="product-card">
            <img src="oli 3.png" alt="Oli 3">
            <p class="product-name">MOTUL OLI MOTOR SCOOTER POWER LE 4T 5W-40 (0.8L)</p>
            <p class="price">Rp82.000</p>
        </div>

        <div class="product-card">
            <img src="oli 4.png" alt="Oli 4">
            <p class="product-name">SHELL ADVANCE AX5 SCOOTER 10W-30 (0.8L)</p>
            <p class="price">Rp46.000</p>
        </div>

        <div class="product-card">
            <img src="oli 5.png" alt="Oli 5">
            <p class="product-name">MOTUL 3100 GOLD 4T 10W-40 (1L)</p>
            <p class="price">Rp63.000</p>
        </div>

        <div class="product-card">
            <img src="oli 6.png" alt="Oli 6">
            <p class="product-name">X-TEN DOUBLE ESTER MATIC BEAT MIO (0.8L)</p>
            <p class="price">Rp113.500</p>
        </div>

        <div class="product-card">
            <img src="oli 7.png" alt="Oli 7">
            <p class="product-name">CTX REV MAX SPORT 10W-30 SPORT/BEBEK (0.8L)</p>
            <p class="price">Rp120.000</p>
        </div>

        <div class="product-card">
            <img src="oli 8.png" alt="Oli 8">
            <p class="product-name">CTX REV 2T - OLI SAMPING 2 TAK SINETIK GRADE ESTER (1L)</p>
            <p class="price">Rp147.000</p>
        </div>
    </main>

</body>
</html>
