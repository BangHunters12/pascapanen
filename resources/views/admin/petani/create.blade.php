@extends('layouts/admin.admin')

@section('content')
<div class="container">
    <h2>Tambah Petani</h2>
    <form action="{{ route('petani.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Petani</label>
            <input type="text" name="nama_petani" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat_petani" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Level</label>
            <select name="level" class="form-control" required>
                <option value="prepetani">Prepetani</option>
                <option value="petani">Petani</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection