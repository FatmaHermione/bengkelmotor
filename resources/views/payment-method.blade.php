<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Metode Pembayaran</title>

    <style>
        body {
            background: #f4f4f4;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            width: 95%;
            margin: 25px auto;
        }

        /* HEADER */
        .header {
            display: flex;
            align-items: center;
            gap: 15px;
            background: linear-gradient(to right, #ff9b00, #ff6a00);
            padding: 15px 20px;
            border-radius: 12px;
            color: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .back-btn {
            font-size: 22px;
            background: #fff;
            color: #333;
            padding: 6px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .title {
            margin-top: 25px;
            font-size: 22px;
            color: #333;
            font-weight: bold;
        }

        /* CARD METHOD */
        .method-card {
            background: #fff;
            border-radius: 12px;
            padding: 18px;
            margin-top: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: .25s;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        .method-card:hover {
            border-color: #ff8a00;
        }

        .method-card.selected {
            border-color: #ff7a00;
            background: #fff5e6;
        }

        .method-card img {
            width: 48px;
            height: 48px;
        }

        .method-text {
            font-size: 17px;
            color: #333;
        }

        /* RINGKASAN */
        .summary-box {
            margin-top: 25px;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.12);
        }

        .sum-total {
            font-size: 28px;
            font-weight: bold;
        }

        /* BUTTON */
        .btn-next {
            width: 100%;
            margin-top: 20px;
            background: #ff7a00;
            border: none;
            padding: 14px;
            border-radius: 10px;
            color: #fff;
            font-size: 17px;
            cursor: pointer;
            transition: .25s;
            font-weight: 600;
        }

        .btn-next:hover {
            background: #ff5500;
            transform: translateY(-2px);
            box-shadow: 0 5px 14px rgba(255,115,0,0.45);
        }

        input[type=radio] {
            transform: scale(1.3);
        }
    </style>

    <script>
        // membuat card tersorot saat dipilih
        function selectCard(el) {
            document.querySelectorAll('.method-card').forEach(card => {
                card.classList.remove('selected');
            });
            el.classList.add('selected');
            el.querySelector('input[type=radio]').checked = true;
        }
    </script>
</head>

<body>

    <div class="container">

        <!-- HEADER -->
        <div class="header">
            <div class="back-btn" onclick="history.back()">←</div>
            <div>
                <div style="font-size: 26px; font-weight: bold;">🛵 AXERA MOTOR</div>
                <small>Bengkel Servis Motor</small>
            </div>
        </div>

        <!-- TITLE -->
        <div class="title">Pilih Metode Pembayaran</div>

        <!-- RINGKASAN -->
        <div class="summary-box">
            <div>Total Pembayaran:</div>
            <div class="sum-total">Rp {{ number_format($total) }}</div>
        </div>

        <!-- FORM -->
        <form action="{{ route('choose.payment.method') }}" method="POST">
            @csrf
<!-- CASH PAYMENT -->
<label class="method-card" onclick="selectCard(this)">
    <input type="radio" name="method" value="cash" required>
    <div style="font-size:40px;">💵</div>
    <div class="method-text">Cash Payment</div>
</label>

<!-- QRIS -->
<label class="method-card" onclick="selectCard(this)">
    <input type="radio" name="method" value="qris">
    <div style="font-size:40px;">📳</div>
    <div class="method-text">QRIS Payment</div>
</label>

<!-- BANK TRANSFER -->
<label class="method-card" onclick="selectCard(this)">
    <input type="radio" name="method" value="transfer">
    <div style="font-size:40px;">🏦</div>
    <div class="method-text">Bank Transfer Payment</div>
</label>

<!-- VIRTUAL ACCOUNT -->
<label class="method-card" onclick="selectCard(this)">
    <input type="radio" name="method" value="va">
    <div style="font-size:40px;">💳</div>
    <div class="method-text">Virtual Account (BCA)</div>
</label>


            <button class="btn-next">Lanjut Bayar</button>
        </form>

    </div>

</body>
</html>