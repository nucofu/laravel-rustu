@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Admin</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $admin->nama_lengkap) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
            <small class="text-muted">*Kosongkan jika tidak ingin mengubah password.</small>
        </div>
        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-control" required>
                <option value="Super Admin" {{ $admin->role == 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
                <option value="Admin" {{ $admin->role == 'Admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Foto Profil</label><br>
            @if($admin->foto_profil)
                <img src="{{ asset('storage/'.$admin->foto_profil) }}" width="100" class="mb-2" alt="Foto">
            @endif
            <input type="file" name="foto_profil" class="form-control" accept="image/*">
            <small class="text-muted">*Abaikan jika tidak ingin mengubah foto profil.</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Data</button>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
