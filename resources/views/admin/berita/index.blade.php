@extends('layouts/admin.admin')

@section('content')

<h2>Berita</h2>
<p>Selamat datang di halaman Berita.</p>

<a href="{{ route('berita.create')}}" class="btn btn-primary">Tambah Berita</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($beritas as $berita)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <img src="{{ asset('storage/'.$berita->gambar) }}" alt="{{ $berita->judul }}" class="img-fluid" >
            </td>
            <td>{{ $berita->judul }}</td>
            <td>{{ $berita->isi }}</td>
            <td>
                <a href="{{ route('berita.edit', $berita) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('berita.destroy', $berita) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
                
        @endforeach
    </tbody>
</table>

@endsection