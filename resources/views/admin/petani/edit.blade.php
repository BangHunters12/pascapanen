@extends('layouts/admin.admin')

@section('content')
<div class="container">
    <h2>Edit Petani</h2>
    <form action="{{ route('petani.update', $petani->id_petani) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Petani</label>
            <input type="text" name="nama_petani" class="form-control" value="{{ $petani->nama_petani }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat_petani" class="form-control" value="{{ $petani->alamat_petani }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ $petani->username }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $petani->email }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $petani->no_hp }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Level</label>
            <select name="level" class="form-control" required>
                <option value="petani" {{ $petani->level == 'petani' ? 'selected' : '' }}>Petani</option>
                <option value="admin" {{ $petani->level == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
