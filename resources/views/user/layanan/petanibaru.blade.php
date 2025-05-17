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
    <li><a href="/alat_bajak" class="filter-btn {{ Request::is('alat_bajak') ? 'active' : '' }}">Alat Bajak</a></li>
    <li><a href="/alat_panen" class="filter-btn {{ Request::is('alat_panen') ? 'active' : '' }}">Alat Panen</a></li>
    <li><a href="/tenagatanam" class="filter-btn {{ Request::is('tenagatanam') ? 'active' : '' }}">Tenaga Tanam</a></li>
    <li><a href="/petanibaru" class="filter-btn {{ Request::is('petanibaru') ? 'active' : '' }}">Petani Baru</a></li>
  </ul>
</div>
    {{-- Gambar --}}
    <div class="mb-4 text-center">
        <img src="{{ asset('assets/images/logos/petanibaru.jpg') }}" alt="Alat Bajak" class="img-fluid rounded shadow-sm">
    </div>

    {{-- Konten Layanan --}}
  <<<!-- Deskripsi -->
<div class="text-center mb-4">
    <h5 class="fw-semibold" style="font-size: 1.2rem;"> Layanan petani baru</h5>
    <p class="text-muted" style="max-width: 700px; margin: 0 auto; font-size: 0.95rem;">
   paket khusus petani baru yang mencangkup alat,tenaga dan panduan untuk bertani
    </p>
</div>

<!-- Fasilitas -->
<div class="mb-4">
    <h5 class="text-success fw-semibold text-center mb-3" style="font-size: 1.1rem;">Fasilitas</h5>
    <ol class="text-muted" style="max-width: 700px; margin: 0 auto; font-size: 0.95rem; line-height: 1.7;">
        <li>Alat bajak, tenaga tanam, dan konsultasi dasar pertanian</li>
        <li>Cocok untuk kamu yang baru memulai bertani</li>
        <li>Dapatkan pendampingan awal yang GRATIS</li>
       
    </ol>
</div>
     {{-- Tombol Aksi --}}
     <div class="text-center mt-4" style="margin-bottom: 50px;">
    <a class="btn btn-lg px-4 text-white shadow-sm" style="background-color: #f5b93a; border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#formPengajuanModal">
        Ajukan Sewa
    </a>
</div>
</div>
@endsection

<!-- Modal Form Pengajuan -->
<div class="modal fade" id="formPengajuanModal" tabindex="-1" aria-labelledby="formPengajuanLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="backdrop-filter: blur(10px);">
      <div class="modal-header">
        <h5 class="modal-title" id="formPengajuanLabel">Form Pengajuan Sewa Untuk Petani Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
            @csrf

            <div class="mb-3">
                <label for="tanggal_sewa" class="form-label">Tanggal Sewa:</label>
                <input type="date" name="tanggal_sewa" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="lama_sewa_hari" class="form-label">Lama Sewa (hari):</label>
                <input type="number" name="lama_sewa_hari" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan (Opsional):</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">Ajukan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>