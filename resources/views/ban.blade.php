<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXERA MOTOR - Ban</title>
    <link rel="icon" href="{{ asset('img/logo.png')}} ">
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
            <img src="{{ asset('img/bike.png') }}" alt="Logo Motor" class="logo-icon">
            <div class="logo-text">
                <h1>AXERA MOTOR</h1>
                <p>Bengkel Servis Motor</p>
            </div>
        </div>
        <h2 class="page-title">BAN</h2>
    </header>

    <!-- Tombol kembali -->
    <div class="back-container">
        <a href="{{ route('home') }}" class="back-btn">⬅ Kembali</a>
    </div>

    <!-- Konten produk -->
    <main class="product-container">
        <div class="product-card">
            <img src="{{ asset('img/ban1.png') }}" alt="Ban 1">
            <p class="product-name">FDR TT/TL FLEMMO RING 14 BAN MOTOR TUBE TYPE DAN TUBELESS 80/90-14 TL</p>
            <p class="price">Rp225.000</p>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/ban2.png') }}" alt="Ban 2">
            <p class="product-name">FDR TL SPORT MP27 RING 14 RACING 90/80-14</p>
            <p class="price">Rp369.000</p>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/ban3.png') }}" alt="Ban 3">
            <p class="product-name">FDR TT/TL SPARTAX RING 17 TUBELESS 70/90-17 TT</p>
            <p class="price">Rp174.000</p>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/ban4.png') }}" alt="Ban 4">
            <p class="product-name">FDR TL SPORT MP76 RING 17 TUBELESS 90/80-17</p>
            <p class="price">Rp477.000</p>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/ban5.png') }}" alt="Ban 5">
            <p class="product-name">FDR TL SPORT XR EVO RING 14 80/90-14</p>
            <p class="price">Rp230.000</p>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/ban6.png') }}" alt="Ban 6">
            <p class="product-name">FDR TL GENZI PRO RING 14 80/80-14</p>
            <p class="price">Rp212.000</p>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/ban7.png') }}" alt="Ban 7">
            <p class="product-name">IRC NF66 TUBELESS MATIC 80/90-14</p>
            <p class="price">Rp221.000</p>
        </div>

        <div class="product-card">
            <img src="{{ asset('img/ban8.png') }}" alt="Ban 8">
            <p class="product-name">IRC GP5 SEMI TRAIL MATIC RING 14 80/90 & 90/90-14</p>
            <p class="price">Rp225.000</p>
        </div>
    </main>

</body>
</html>
