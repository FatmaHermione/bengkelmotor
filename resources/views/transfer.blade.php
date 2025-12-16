<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Bank</title>

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
            margin-bottom: 10px;
        }

        .total {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .bank-info {
            text-align: left;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 12px;
            margin-top: 10px;
        }

        .bank-info div {
            margin-bottom: 8px;
            font-size: 15px;
        }

        .bank-info strong {
            display: inline-block;
            width: 120px;
        }
    </style>
</head>
<body>

<div class="box">
    <div class="title">Transfer Bank</div>

    <div class="total">
        Rp {{ number_format($total) }}
    </div>

    <div class="bank-info">
        <div><strong>Bank</strong> BCA</div>
        <div><strong>No Rek</strong> 1234567890</div>
        <div><strong>Atas Nama</strong> AXERA MOTOR</div>
    </div>
</div>

<form id="autoPay" action="{{ route('process-payment') }}" method="POST">
    @csrf
</form>

<script>
    setTimeout(() => {
        document.getElementById('autoPay').submit();
    }, 2000); // 10 detik
</script>
