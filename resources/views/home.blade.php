<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXERA MOTOR - Home</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

    <header class="navbar">
        <div class="logo">
            <img src="{{ asset('img/bike.png') }}" alt="Logo Motor" class="logo-icon">
            <div class="logo-text">
                <h1>AXERA MOTOR</h1>
                <p>Bengkel Servis Motor</p>
            </div>
        </div>

        <div class="user-section">
            <div class="user-icon">👤</div>
            <div class="user-info">
                <p class="role">{{ Auth::user()->username ?? 'Kasir' }}</p>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout">Log out</button>
                </form>
            </div>
        </div>
    </header>

    <main>
        <h2 class="section-title">Servis</h2>

        <div class="service-container">
            <div class="service-box">
                <a href="{{ route('gear') }}">
                    <img src="{{ asset('img/gear.png') }}" alt="Gear / Mesin Motor">
                    <p><b>Gear</b></p>
                </a>
            </div>

            <div class="service-box">
                <a href="{{ route('oli') }}">
                    <img src="https://cdn-icons-png.flaticon.com/512/798/798867.png" alt="Oli Mesin / Pelumas">
                    <p><b>Oli</b></p>
                </a>
            </div>

            <div class="service-box">
                <a href="{{ route('ban') }}">
                    <img src="{{ asset('img/ban.png') }}" alt="Ban / Roda">
                    <p><b>Ban</b></p>
                </a>
            </div>

            <div class="service-box">
                <a href="{{ route('sparepart') }}">
                    <img src="{{ asset('img/crankshaft.png') }}" alt="Sparepart / Perlengkapan">
                    <p><b>Sparepart</b></p>
                </a>
            </div>
        </div>

        <div class="form-button">
            <!-- Link ke form service -->
            <a href="{{ route('service.form') }}" class="btn-service">Form Service</a>
        </div>

        <div class="pegawai-button">
            <!-- Link ke halaman data pegawai -->
            <a href="{{ route('pegawai.index') }}" class="btn-pegawai">Data Pegawai</a>
        </div>
    </main>

</body>
</html>
