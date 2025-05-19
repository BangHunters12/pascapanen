@extends('layouts.app')

@push('styles')
<style>
    .profile-pic-wrapper {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 0 auto 1rem;
    }

    .profile-pic-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #ddd;
    }

    .edit-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.6);
        color: white;
        text-align: center;
        padding: 10px;
        border-bottom-left-radius: 50%;
        border-bottom-right-radius: 50%;
        opacity: 0;
        transition: 0.3s;
        cursor: pointer;
        font-size: 14px;
    }

    .profile-pic-wrapper:hover .edit-overlay {
        opacity: 1;
    }

    .profile-pic-wrapper input[type="file"] {
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        cursor: pointer;
    }
</style>
@endpush

@section('content')
<div class="container py-5">
    <section>
        <header class="mb-4 text-center">
            <h2 class="h5 fw-bold text-dark">{{ __('Profil Anda') }}</h2>
            <p class="text-muted small">{{ __("Perbarui informasi profil Anda.") }}</p>
        </header>

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            {{-- Foto Profil --}}
            <div class="mb-4">
                <div class="profile-pic-wrapper">
                    <img id="preview-foto" src="{{ $user->logo ? asset('storage/'.$user->logo) : asset('default/user.png') }}" alt="Foto Profil">
                    <div class="edit-overlay">Edit Foto</div>
                    <input type="file" name="logo" id="input-logo" accept="image/*" onchange="previewFoto(this)">
                </div>
                @error('logo') <div class="text-danger text-center small">{{ $message }}</div> @enderror
            </div>

            {{-- Nama Lengkap --}}
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap"
                    class="form-control @error('nama_lengkap') is-invalid @enderror"
                    value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required>
                @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Username --}}
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username"
                    class="form-control @error('username') is-invalid @enderror"
                    value="{{ old('username', $user->username) }}" required>
                @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Gender --}}
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin"
                    class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Alamat --}}
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat"
                    class="form-control @error('alamat') is-invalid @enderror"
                    required>{{ old('alamat', $user->alamat) }}</textarea>
                @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- No Telepon --}}
            <div class="mb-3">
                <label for="no_telp" class="form-label">No Telepon</label>
                <input type="text" name="no_telp" id="no_telp"
                    class="form-control @error('no_telp') is-invalid @enderror"
                    value="{{ old('no_telp', $user->no_telp) }}" required>
                @error('no_telp') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $user->email) }}" required>
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Password (optional) --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password Baru (kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror">
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Password Confirmation --}}
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            {{-- Tombol Submit --}}
            <div class="d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-primary">{{ __('Simpan Perubahan') }}</button>
                @if (session('status') === 'profile-updated')
                    <span class="text-success small">Profil berhasil diperbarui.</span>
                @endif
            </div>
        </form>
    </section>
</div>
@endsection

@push('scripts')
<script>
    function previewFoto(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('preview-foto').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush
