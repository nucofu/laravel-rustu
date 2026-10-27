@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Event</h2>
        <a href="{{ route('event.create') }}" class="btn btn-primary">Tambah Event</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Gambar</th>
                <th>Judul Event</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Pembuat (Admin)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->id }}</td>
                <td>
                    @if($event->gambar)
                        <img src="{{ asset('storage/'.$event->gambar) }}" width="70" alt="Gambar Event">
                    @else
                        -
                    @endif
                </td>
                <td>{{ $event->judul_event }}</td>
                <td>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($event->tanggal_selesai)->format('d M Y') }}</td>
                <td>{{ $event->lokasi }}</td>
                <td>{{ $event->admin->nama_lengkap ?? 'Tidak ada' }}</td>
                <td>
                    <a href="{{ route('event.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('event.destroy', $event->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus event ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
