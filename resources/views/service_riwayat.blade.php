<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Booking Servis</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    
    {{-- Baris Font Poppins SUDAH DIHAPUS --}}
    
    <link rel="stylesheet" href="{{ asset('css/serviceriwayat.css') }}">
</head>
<body>

    <header>
        <div class="back-container">
            <a href="{{ route('service.form') }}" class="back-btn">⬅ Kembali</a>
        </div>
        
        <h2>Riwayat Booking Servis</h2>
    </header>

    <div class="container">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Pelanggan</th>
                    <th>Motor & Nopol</th>
                    <th>Jadwal</th>
                    <th>Keluhan</th>
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
                        <small style="color: #777;">{{ $b->no_hp }}</small>
                    </td>
                    <td>
                        {{ $b->tipe_motor }}<br>
                        <span style="background:#eee; padding: 3px 6px; border-radius: 4px; font-size: 11px;">{{ $b->nopol }}</span>
                    </td>
                    <td>
                        {{ date('d M Y', strtotime($b->tgl_servis)) }}<br>
                        <span style="color: #ff8113; font-weight: bold; font-size: 12px;">Jam {{ $b->jam_servis }}</span>
                    </td>
                    <td>{{ $b->keluhan ?? '-' }}</td>
                    <td>
                        <span class="status-badge {{ $b->status == 'Selesai' ? 'bg-done' : 'bg-wait' }}">
                            {{ $b->status }}
                        </span>
                    </td>
                    <td>
                        @if(Auth::check() && Auth::user()->role == 'admin')
                            @if($b->status == 'Menunggu')
                                <form action="{{ route('service.update', $b->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-action" onclick="return confirm('Selesaikan?')">✅ Selesai</button>
                                </form>
                            @else
                                <span style="color:#aaa; font-style:italic; font-size:12px;">Selesai</span>
                            @endif
                        @else
                            <span style="font-size: 12px; color: #777;">
                                {{ $b->status == 'Menunggu' ? 'Diproses...' : 'Selesai' }}
                            </span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 40px; color: #888;">
                        Belum ada data booking servis.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>