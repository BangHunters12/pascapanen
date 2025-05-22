@extends('layouts.admin.admin')
@section('content')

<div class="container py-4">
    <h2 class="mb-4">Daftar Pengajuan Padi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Petani</th>
                    <th>Nama Padi</th>
                    <th>Jumlah Karung</th>
                    <th>Perlu Mobil</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Ubah Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengajuanList as $pengajuan)
                    <tr>
                        <td>{{ $pengajuan->id_pengajuan }}</td>
                        <td>{{ $pengajuan->petani->nama_lengkap }}</td>
                        <td>{{ $pengajuan->padi->nama_padi }}</td>
                        <td>{{ $pengajuan->jumlah_karung }}</td>
                        <td>{{ $pengajuan->perlu_mobil ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ $pengajuan->tanggal_pengajuan }}</td>
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
                                <form action="{{ route('pengajuanpadi.updateStatus', $pengajuan->id_pengajuan) }}" method="POST">
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
                        <td colspan="9" class="text-center">Belum ada pengajuan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
