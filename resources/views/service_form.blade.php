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

    <header>
        <div class="back-container">
            <a href="{{ route('home') }}" class="back-btn">⬅ Kembali</a>
        </div>
        <h1>Form Service</h1>
        {{-- Tombol Lihat Riwayat di Pojok Kanan --}}
        <div style="position: absolute; right: 20px;">
            <a href="{{ route('service.riwayat') }}" style="color: white; text-decoration: none; font-weight: bold; border: 1px solid white; padding: 5px 10px; border-radius: 5px;">📂 Lihat Riwayat</a>
        </div>
    </header>

    <main>
        <h2 class="form-title">Silakan isi formulir untuk melakukan servis!</h2>

        {{-- Notifikasi Sukses dari Controller --}}
        @if(session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 15px; margin: 20px auto; max-width: 600px; border-radius: 5px; text-align: center;">
                ✅ {{ session('success') }}
            </div>
        @endif

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
                            @for ($i = 8; $i <= 17; $i++)
                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                            @endfor
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