@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Edit Profil</h3>

        <form action="{{ route('profile.updateProfil') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @foreach (['nama_lengkap', 'username', 'email', 'no_telp', 'alamat', 'gender', 'logo'] as $field)
                @error($field)
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            @endforeach

            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control"
                    value="{{ old('nama_lengkap', Auth::user()->nama_lengkap) }}">
            </div>
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control"
                    value="{{ old('username', Auth::user()->username) }}">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()->email) }}">
            </div>
            <div class="mb-3">
                <label>No Telepon</label>
                <input type="text" name="no_telp" class="form-control"
                    value="{{ old('no_telp', Auth::user()->no_telp) }}">
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ old('alamat', Auth::user()->alamat) }}</textarea>
            </div>
            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="gender" class="form-control">
                    <option value="Laki-laki" {{ Auth::user()->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ Auth::user()->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Foto / Logo (opsional)</label>
                <input type="file" name="logo" class="form-control">
                @if (Auth::user()->logo)
                    <img src="{{ asset('storage/' . Auth::user()->logo) }}" class="mt-2" width="100">
                @endif
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="{{ route('profile.profil') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
