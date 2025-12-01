<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pembayaran Sukses</title>

    <style>
        body {
            background: #1c1c1c;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 700px;
            margin: 50px auto;
            background: #fff;
            padding: 25px;
            border-radius: 15px;
        }

        .header {
            display: flex;
            align-items: center;
            background: linear-gradient(to right, #ff8a00, #ff5f00);
            padding: 20px;
            border-radius: 10px;
            color: #fff;
            margin-bottom: 25px;
        }

        .logo {
            font-size: 30px;
            margin-right: 10px;
        }

        .content {
            text-align: center;
            padding: 40px 20px;
        }

        .success-icon {
            font-size: 70px;
            color: #28a745;
        }

        .title {
            font-size: 28px;
            margin-top: 20px;
            font-weight: bold;
        }

        .subtitle {
            font-size: 16px;
            margin-top: 10px;
            color: #555;
        }

        .btn-home {
            margin-top: 30px;
            padding: 12px 20px;
            background: #ff7700;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-home:hover {
            background: #ff5500;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Header -->
        <div class="header">
            <div class="logo">🛵</div>
            <div>
                <b>AXERA MOTOR</b><br>
                <small>Bengkel Servis Motor</small>
            </div>
        </div>

        <!-- Success Box -->
        <div class="content">

            <div class="success-icon">✔</div>

            <div class="title">Pembayaran Berhasil!</div>
            <div class="subtitle">
                Terima kasih, transaksi Anda telah diproses dengan sukses.
            </div>

            <a href="{{ route('home') }}" class="btn-home">Kembali ke Beranda</a>
        </div>

    </div>

</body>
</html>
