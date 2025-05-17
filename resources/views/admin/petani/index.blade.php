@extends('layouts/admin.admin')

@section('content')
<div class="container">
    <h2>Daftar Petani</h2>
    <a href="{{ route('petani.create') }}" class="btn btn-primary">Tambah Petani</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Username</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($petanis as $petani)
            <tr>
                <td>{{ $petani->nama_petani }}</td>
                <td>{{ $petani->alamat_petani }}</td>
                <td>{{ $petani->username }}</td>
                <td>{{ $petani->email }}</td>
                <td>{{ $petani->no_hp }}</td>
                <td>{{ $petani->level }}</td>
                <td>
                    <a href="{{ route('petani.edit', $petani->id_petani) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('petani.destroy', $petani->id_petani) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection