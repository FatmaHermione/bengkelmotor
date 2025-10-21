<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Servis - AXERA MOTOR</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/formservis.css') }}">
</head>
<body>

    <header class="header-container">
        <nav class="navbar">
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
                        <button type="submit" class="logout-button">Log out</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="action-bar">
            <a href="{{ route('home') }}" class="back-arrow" title="Kembali">&larr;</a>
        </div>
    </header>

    <main>
        <h2 class="form-title">form berikut untuk melakukan service ya!</h2>

        <div class="form-container">
            <form action="{{ route('service.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" required>
                </div>

                <div class="form-row">
                    <label for="no_hp">No Handphone</label>
                    <input type="tel" id="no_hp" name="no_hp" required>
                </div>

                <div class="form-row">
                    <label for="nopol">Nomor Polisi Kendaraan</label>
                    <input type="text" id="nopol" name="nopol" required>
                </div>

                <div class="form-row">
                    <label for="tipe_motor">Type Motor Anda</label>
                    <input type="text" id="tipe_motor" name="tipe_motor" required>
                </div>

                <div class="form-row">
                    <label for="tgl_servis">Tgl Rencana Servis</label>
                    <input type="date" id="tgl_servis" name="tgl_servis" required>
                </div>

                <div class="form-row">
                    <label for="jam">Rencana Jam Servis</label>
                    <div class="time-select">
                        <select name="jam" id="jam" required>
                            <option value="">Jam</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                        </select>
                        <select name="menit" id="menit" required>
                            <option value="">Menit</option>
                            <option value="00">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <label for="keluhan">Keluhan Anda? (Jika ada)</label>
                    <input type="text" id="keluhan" name="keluhan">
                </div>

                <div class="form-row submit-row">
                    <button type="submit" class="btn-kirim">Kirim ✈️</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>