@extends('layouts/admin.admin')

@section('content')
<div class="container">
<<<<<<< HEAD
    <h4>Edit Produk</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
=======
    <h2>Edit Produk</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
>>>>>>> 0e88d7195457f7c44aa8c250a2f1afdd79a21157
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
<<<<<<< HEAD
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
=======
            <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
>>>>>>> 0e88d7195457f7c44aa8c250a2f1afdd79a21157
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
<<<<<<< HEAD
            <select class="form-select" id="kategori" name="kategori" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="beras" {{ $produk->kategori == 'beras' ? 'selected' : '' }}>Beras</option>
                <option value="pupuk" {{ $produk->kategori == 'pupuk' ? 'selected' : '' }}>Pupuk</option>
                <option value="obat"  {{ $produk->kategori == 'obat'  ? 'selected' : '' }}>Obat</option>
=======
            <select name="kategori" class="form-control" required>
                <option value="beras" {{ $produk->kategori == 'beras' ? 'selected' : '' }}>Beras</option>
                <option value="pupuk" {{ $produk->kategori == 'pupuk' ? 'selected' : '' }}>Pupuk</option>
                <option value="obat" {{ $produk->kategori == 'obat' ? 'selected' : '' }}>Obat</option>
>>>>>>> 0e88d7195457f7c44aa8c250a2f1afdd79a21157
            </select>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
<<<<<<< HEAD
            <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $produk->harga) }}" required>
=======
            <input type="number" name="harga" class="form-control" value="{{ old('harga', $produk->harga) }}" required>
>>>>>>> 0e88d7195457f7c44aa8c250a2f1afdd79a21157
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
<<<<<<< HEAD
            <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $produk->stok) }}" required>
        </div>

        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <select class="form-select" id="satuan" name="satuan" required>
                <option value="">-- Pilih Satuan --</option>
                <option value="kg" {{ $produk->satuan == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                <option value="ltr" {{ $produk->satuan == 'ltr' ? 'selected' : '' }}>Liter (ltr)</option>
                <option value="sak" {{ $produk->satuan == 'sak' ? 'selected' : '' }}>Sak</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Saat Ini</label><br>
            @if ($produk->gambar)
                <img src="{{ asset('storage/gambar_produk/' . $produk->gambar) }}" alt="Gambar Produk" style="max-height: 150px;">
            @else
                <p class="text-muted">Tidak ada gambar</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Ganti Gambar (Opsional)</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
=======
            <input type="number" name="stok" class="form-control" value="{{ old('stok', $produk->stok) }}" required>
        </div>

        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan (contoh: gram, kilogram, pokok)</label>
            <input type="text" name="satuan" class="form-control" value="{{ old('satuan', $produk->satuan) }}" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Produk (biarkan kosong jika tidak diubah)</label>
            <input type="file" name="gambar" class="form-control">
            @if($produk->gambar)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $produk->gambar) }}" width="150" alt="Gambar saat ini">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Produk</button>
>>>>>>> 0e88d7195457f7c44aa8c250a2f1afdd79a21157
    </form>
</div>
@endsection
