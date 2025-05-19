@extends('layouts.admin.admin')
@section('content')

<div class="container py-4">
    <h2 class="mb-4">Daftar Pengajuan Sewa</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th></th>
                    <th>Nama Petani</th>
                    <th>Jenis Sewa</th>
                    <th>Tanggal Sewa</th>
                    <th>Lama Sewa (hari)</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Ubah Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengajuanList as $pengajuan)
                    <tr>
                        <td>{{ $pengajuan->id_pengajuan }}</td>
                        <td>{{ $pengajuan->petani->nama_lengkap }}</td> <!-- Pastikan relasi petani ada -->
                        <td>{{ $pengajuan->jenisSewa->nama_sewa }}</td> <!-- Pastikan relasi jenisSewa ada -->
                        <td>{{ \Carbon\Carbon::parse($pengajuan->tanggal_sewa)->format('d-m-Y') }}</td>
                        <td>{{ $pengajuan->lama_sewa_hari }}</td>
                        <td>
                            <span class="badge bg-{{ 
                                $pengajuan->status == 'menunggu persetujuan' ? 'secondary' : 
                                ($pengajuan->status == 'disetujui' ? 'success' : 'danger') 
                            }}">
                                {{ ucfirst($pengajuan->status) }}
                            </span>
                        </td>
                        <td>{{ $pengajuan->keterangan ?? '-' }}</td>
                        <td>
                            @if ($pengajuan->status === 'menunggu persetujuan')
                                <form action="{{ route('pengajuansewa.updateStatus', $pengajuan->id_pengajuan) }}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <select name="status" class="form-select form-select-sm" required>
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="disetujui">Disetujui</option>
                                            <option value="ditolak">Ditolak</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                    </div>
                                </form>
                            @else
                                <em>-</em>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada pengajuan sewa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
