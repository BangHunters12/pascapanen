@extends('layouts/admin.admin')
@section('content')

<div class="container">
    <h1>Tambah Jenis Sewa</h1>
    <form action="{{ route('jenis-sewa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama sewa</label>
            <input type="tetx" name="nama_sewa" class="form-control" required>
        <button type="submit" class=" btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection
