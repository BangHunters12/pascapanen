@extends('layouts/admin.admin')

@section('content')
<div class="container">
    <h4>Tambah Produk</h4>
<form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nama_produk" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name="nama_produk" required>
    </div>

    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select class="form-select" name="kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="beras">Beras</option>
            <option value="pupuk">Pupuk</option>
            <option value="obat">Obat</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" name="harga" required>
    </div>

    <div class="mb-3">
        <label for="stok" class="form-label">Stok</label>
        <input type="number" class="form-control" name="stok" required>
    </div>

    <div class="mb-3">
        <label for="satuan" class="form-label">Satuan</label>
        <input type="text" class="form-control" name="satuan" placeholder="Contoh: gram, kilogram, pokok" required>
    </div>

    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar Produk</label>
        <input type="file" class="form-control" name="gambar" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

</div>
@endsection
