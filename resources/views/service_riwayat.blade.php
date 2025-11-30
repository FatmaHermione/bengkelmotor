<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Servis - AXERA MOTOR</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; margin: 0; }
        header { background-color: #ff9800; padding: 15px; color: white; display: flex; align-items: center; justify-content: space-between; }
        .back-btn { text-decoration: none; color: white; font-weight: bold; background: rgba(0,0,0,0.2); padding: 5px 10px; border-radius: 5px; }
        .container { max-width: 1000px; margin: 20px auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background-color: #eee; }
        .status-label { padding: 3px 8px; border-radius: 10px; font-size: 12px; font-weight: bold; color: white; }
        .status-menunggu { background-color: #f39c12; }
        .status-selesai { background-color: #28a745; }
        .btn-selesai { background-color: #28a745; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>

    <header>
        <a href="{{ route('service.form') }}" class="back-btn">⬅ Kembali ke Form</a>
        <h2>Riwayat Booking Servis</h2>
        <div style="width: 80px;"></div> {{-- Spacer biar tengah --}}
    </header>

    <div class="container">
        @if(session('success'))
            <p style="color: green; font-weight: bold; text-align: center;">{{ session('success') }}</p>
        @endif

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Motor & Nopol</th>
                    <th>Jadwal</th>
                    <th>Keluhan / Request</th>
                    <th>Status</th>
                    <th>Aksi Admin</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $index => $b)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <strong>{{ $b->nama_pelanggan }}</strong><br>
                        <small>{{ $b->no_hp }}</small>
                    </td>
                    <td>
                        {{ $b->tipe_motor }}<br>
                        <span style="background:#eee; padding: 2px 4px; border-radius: 3px; font-size: 11px;">{{ $b->nopol }}</span>
                    </td>
                    <td>
                        {{ date('d M Y', strtotime($b->tgl_servis)) }}<br>
                        <small>Jam {{ $b->jam_servis }}</small>
                    </td>
                    <td>{{ $b->keluhan ?? '-' }}</td>
                    <td>
                        <span class="status-label {{ $b->status == 'Selesai' ? 'status-selesai' : 'status-menunggu' }}">
                            {{ $b->status }}
                        </span>
                    </td>
                    <td>
                        @if($b->status == 'Menunggu')
                            <form action="{{ route('service.update', $b->id) }}" method="POST">
                                @csrf
                                <button class="btn-selesai" onclick="return confirm('Tandai servis ini selesai?')">✅ Selesai</button>
                            </form>
                        @else
                            <span style="color: grey; font-size: 12px;">Sudah Selesai</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 20px;">Belum ada data booking servis.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>