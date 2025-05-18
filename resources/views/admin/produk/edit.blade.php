@extends('layouts/admin.admin')

@section('content')
<div class="container">
    <h2>Edit Produk</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
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
            <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" class="form-control" required>
                <option value="beras" {{ $produk->kategori == 'beras' ? 'selected' : '' }}>Beras</option>
                <option value="pupuk" {{ $produk->kategori == 'pupuk' ? 'selected' : '' }}>Pupuk</option>
                <option value="obat" {{ $produk->kategori == 'obat' ? 'selected' : '' }}>Obat</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga', $produk->harga) }}" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
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
    </form>
</div>
@endsection
