@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Profil Saya</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-center">
                    @if(Auth::user()->logo)
                        <img src="{{ asset('storage/' . Auth::user()->logo) }}" class="img-fluid rounded" alt="Foto Profil">
                    @else
                        <img src="https://via.placeholder.com/150" class="img-fluid rounded" alt="Foto Profil">
                    @endif
                </div>
                <div class="col-md-9">
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>{{ Auth::user()->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>{{ Auth::user()->username }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ Auth::user()->gender }}</td>
                        </tr>
                        <tr>
                            <th>No Telepon</th>
                            <td>{{ Auth::user()->no_telp }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ Auth::user()->alamat }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('profile.editProfil') }}" class="btn btn-primary mt-2">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
