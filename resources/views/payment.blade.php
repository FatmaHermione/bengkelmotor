<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Payment</title>

    <style>
        body {
            background: #1c1c1c;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .header {
            display: flex;
            align-items: center;
            background: linear-gradient(to right, #ff8a00, #ff5f00);
            padding: 20px;
            border-radius: 10px;
            color: #fff;
            margin-bottom: 20px;
        }

        .logo {
            font-size: 28px;
            margin-right: 10px;
        }

        .back-btn {
            font-size: 20px;
            margin-right: 15px;
            cursor: pointer;
            background: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .product-card {
            display: flex;
            padding: 15px;
            background: #f7f7f7;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .product-card img {
            width: 90px;
            margin-right: 20px;
        }

        .summary-box {
            padding: 15px;
            background: #eeeeee;
            border-radius: 10px;
            width: 250px;
            float: right;
        }

        .btn-bayar {
            width: 100%;
            background: #ff7700;
            padding: 10px;
            border: none;
            border-radius: 7px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-bayar:hover {
            background: #ff5500;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <div class="back-btn" onclick="history.back()">←</div>
            <div>
                <div class="logo">🛵 AXERA MOTOR</div>
                <small>Bengkel Servis Motor</small>
            </div>
        </div>

        <h3>Pilih semua ({{ count($items) }})</h3>

        @foreach ($items as $item)
            <div class="product-card">
                <img src="/images/{{ $item['image'] }}" alt="">
                <div style="flex:1;">
                    <b>{{ $item['nama'] }}</b><br>
                    <small>{{ $item['detail'] }}</small><br><br>
                    Harga: <b>Rp{{ number_format($item['harga']) }}</b><br>
                    Qty: {{ $item['qty'] }}<br>

                    @if(isset($item['layanan']))
                    <p style="margin-top:10px;">+ {{ $item['layanan'] }} (Rp{{ number_format($item['biaya_layanan']) }})</p>
                    @endif
                </div>
            </div>
        @endforeach

        <div class="summary-box">
            <h4>Ringkasan</h4>
            <p>Total</p>
            <h2>Rp {{ number_format($total) }}</h2>

            <form action="{{ route('payment.process') }}" method="POST">
                @csrf
                <button class="btn-bayar">Bayar</button>
            </form>
        </div>
    </div>

</body>
</html>