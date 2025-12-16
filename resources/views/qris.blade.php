<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran QRIS</title>

    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f4f4;
        }

        .box {
            max-width: 420px;
            margin: 60px auto;
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 6px 18px rgba(0,0,0,.12);
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .total {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 18px;
        }

        .qris-img {
            width: 260px;
            margin: 10px auto;
        }
    </style>
</head>
<body>

<div class="box">
    <div class="title">Scan QRIS</div>

    <div class="total">
        Rp {{ number_format($total) }}
    </div>

    {{-- QRIS IMAGE --}}
    <img 
        src="{{ asset('img/qris.png') }}" 
        alt="QRIS" 
        class="qris-img"
    >
</div>

<script>
    // AUTO REDIRECT TANPA TAMPILAN (10 DETIK)
    setTimeout(() => {
        window.location.href = "{{ route('payment.qris.finish') }}";
    }, 5000);
</script>

</body>
</html>
