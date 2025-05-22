@extends('layouts.user.user')
@section("content")

<div class="container pt-5 mt-5">

    {{-- Header --}}
    <div class="container section-title" data-aos="fade-up">
    <h2 class="fw-bold">Layanan</h2>
    <p class="lead">Pesan layanan yang anda butuhkan dengan cepat dan mudah</p>
  </div>

    {{-- Navigasi Layanan (ul seperti filter isotope) --}}
  <div style="display: flex; justify-content: center; margin-bottom: 40px;">
    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100" style="display: flex; gap: 10px; list-style: none; padding: 0; margin: 0;">
        <li><a href="{{ route('user.layanan.form', ['jenis' => 'alat_bajak']) }}" class="filter-btn {{ Request::is('layanan/alat_bajak') ? 'active' : '' }}">Alat Bajak</a></li>
        <li><a href="{{ route('user.layanan.form', ['jenis' => 'alat_panen']) }}" class="filter-btn {{ Request::is('layanan/alat_panen') ? 'active' : '' }}">Alat Panen</a></li>
        <li><a href="{{ route('user.layanan.form', ['jenis' => 'tenagatanam']) }}" class="filter-btn {{ Request::is('layanan/tenagatanam') ? 'active' : '' }}">Tenaga Tanam</a></li>
        <li><a href="{{ route('user.layanan.form', ['jenis' => 'petanibaru']) }}" class="filter-btn {{ Request::is('layanan/petanibaru') ? 'active' : '' }}">Petani Baru</a></li>
    </ul>
</div>

    {{-- Gambar --}}
    <div class="mb-4 text-center">
        <img src="{{ asset('assets/images/logos/alatpanen.jpg') }}" alt="Alat Bajak" class="img-fluid rounded shadow-sm">
    </div>

    {{-- Konten Layanan --}}
  <<<!-- Deskripsi -->
<div class="text-center mb-4">
    <h5 class="fw-semibold" style="font-size: 1.2rem;"> Layanan alat panen</h5>
    <p class="text-muted" style="max-width: 700px; margin: 0 auto; font-size: 0.95rem;">
        Gunakan alat panen yang mempercepat proses panen padi dan meminimalisir kerusakan hasil.
    </p>
</div>

<!-- Fasilitas -->
<div class="mb-4">
    <h5 class="text-success fw-semibold text-center mb-3" style="font-size: 1.1rem;">Fasilitas</h5>
    <ol class="text-muted" style="max-width: 700px; margin: 0 auto; font-size: 0.95rem; line-height: 1.7;">
        <li>Tersedia mesin perontok</li>
        <li>Rekomendasi untuk lahan luas dan sempit.</li>
        <li>Disertai operator pengalaman.</li>
       
    </ol>
</div>
    {{-- Tombol Aksi --}}
     <div class="text-center mt-4" style="margin-bottom: 50px;">
    <a class="btn btn-lg px-4 text-white shadow-sm" style="background-color: #f5b93a; border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#formPengajuanModal">
        Ajukan Sewa
    </a>
</div>
</div>

<!-- Modal Form Pengajuan -->
<div class="modal fade" id="formPengajuanModal" tabindex="-1" aria-labelledby="formPengajuanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="backdrop-filter: blur(10px);">
            <div class="modal-header">
                <h5 class="modal-title" id="formPengajuanLabel">Form Pengajuan Sewa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pengajuansewa.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                      <label class="form-label">Nama Petani</label>
                      <input type="text" class="form-control" value="{{ Auth::user()->nama_lengkap }}" disabled>
                    </div>

                    <div class="mb-3">
                      <label for="id_sewa" class="form-label">Pilih Jenis Sewa:</label>
                      <select name="id_sewa" id="id_sewa" class="form-select" required>
                      <option value="" selected disabled>-- Pilih Jenis Sewa --</option>
                      @foreach($sewaList as $sewa)
                      <option value="{{ $sewa->id_sewa }}">{{ $sewa->nama_sewa }}</option>
                      @endforeach
                    </select>
                  </div>

                    <div class="mb-3">
                        <label for="tanggal_sewa" class="form-label">Tanggal Sewa:</label>
                        <input type="date" name="tanggal_sewa" class="form-control" required value="{{ date('Y-m-d') }}">
                    </div>

                    <div class="mb-3">
                        <label for="lama_sewa_hari" class="form-label">Lama Sewa (hari):</label>
                        <input type="number" name="lama_sewa_hari" class="form-control" min="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan (Opsional):</label>
                        <textarea name="keterangan" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if (session('success'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1055">
        <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

@endsection