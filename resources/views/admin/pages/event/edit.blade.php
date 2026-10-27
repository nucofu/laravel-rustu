@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Event</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label">Judul Event</label>
            <input type="text" name="judul_event" class="form-control" value="{{ old('judul_event', $event->judul_event) }}" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $event->deskripsi) }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai', $event->tanggal_mulai) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai', $event->tanggal_selesai) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $event->lokasi) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Admin Penanggung Jawab</label>
            <select name="id" class="form-control" required>
                @foreach($admins as $admin)
                    <option value="{{ $admin->id }}" {{ (old('id', $event->id) == $admin->id) ? 'selected' : '' }}>
                        {{ $admin->nama_lengkap }} ({{ $admin->role }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Event</label><br>
            @if($event->gambar)
                <img src="{{ asset('storage/'.$event->gambar) }}" width="150" class="mb-2" alt="Gambar Event">
            @endif
            <input type="file" name="gambar" class="form-control" accept="image/*">
            <small class="text-muted">*Abaikan jika tidak ingin mengubah gambar.</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Data</button>
        <a href="{{ route('event.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
