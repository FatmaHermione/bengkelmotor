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
    <a href="{{ route('home') }}" class="ikon-kembali" title="Kembali ke Home">←</a>
    <h1>Data Pegawai</h1>
  </header>

  <main class="pegawai-container">
    <div class="pegawai-card">
      <div class="foto">
       <img src="{{ asset('img/marsya.jpeg') }}" alt="Pegawai 1">
      </div>
      <div class="info">
        <h2>Yola Valery</h2>
        <p><strong>Jabatan:</strong> CEO AXERA MOTOR</p>
        <p><strong>Email:</strong> yola@example.com</p>
      </div>
    </div>

    <div class="pegawai-card">
      <div class="foto">
       <img src="{{ asset('img/jcwk.jpeg') }}" alt="Pegawai 2">
      </div>
      <div class="info">
        <h2>Rian Saputra</h2>
        <p><strong>Jabatan:</strong> Montir</p>
        <p><strong>Email:</strong> rian@example.com</p>
      </div>
    </div>

    <div class="pegawai-card">
      <div class="foto">
       <img src="{{ asset('img/putri.jpeg') }}" alt="Pegawai 3">
      </div>
      <div class="info">
        <h2>Intan Ayu</h2>
        <p><strong>Jabatan:</strong> Kasir</p>
        <p><strong>Email:</strong> intan@example.com</p>
      </div>
    </div>
  </main>
</body>
</html>
