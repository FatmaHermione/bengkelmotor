@extends('layouts.app')

@section('content')
<div class="container">
    <h3>👥 Data Pelanggan</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggans as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->phone ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.pelanggan.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.pelanggan.destroy', $p->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus pelanggan ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
