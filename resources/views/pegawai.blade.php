<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link rel="stylesheet" href="{{ asset('css/dataPegawai.css') }}">
</head>
<body>

<header>
    <div class="back-container">
        <a href="{{ route('home') }}" class="back-btn">⬅ Kembali</a>
    </div>
    <h1>Data Pegawai</h1>
</header>

<main class="pegawai-container">

    @foreach ($pegawai as $p)
    <div class="pegawai-card">

        <div class="foto">
            <img src="{{ asset($p['foto']) }}" alt="{{ $p['nama'] }}">
        </div>

        <div class="info">
            <h2>{{ $p['nama'] }}</h2>
            <p><strong>Jabatan:</strong> {{ $p['jabatan'] }}</p>
            <p><strong>Email:</strong> {{ $p['email'] }}</p>

            <div class="aksi">
                <button class="btn-edit" onclick="alert('Fitur edit belum dibuat (statis).')">Edit</button>
                <button class="btn-hapus" onclick="confirm('Yakin hapus?') ? alert('Dihapus (statis).') : null">Hapus</button>
            </div>
        </div>

    </div>
    @endforeach

</main>

</body>
</html>
