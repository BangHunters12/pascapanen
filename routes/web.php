<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PadiController;
use App\Http\Controllers\ProduksiBerasController;
use App\Http\Controllers\PengajuanPadiController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index'])->name('beranda');
Route::get('/berita/{id}', [HomeController::class, 'detail'])->name( 'berita.detail');
Route::get('/penjualan-padi', [PengajuanPadiController::class, 'penjualanView'])->name('user.penjualan_padi.penjualanpadi');

Route::get('/alat_bajak', function () {
    return view('user.layanan.alatbajak');
});

Route::get('/alat_panen', function () {
    return view('user.layanan.alatpanen');
});

Route::get('/tenagatanam', function () {
    return view('user.layanan.tenagatanam');
});

Route::get('/petanibaru', function () {
    return view('user.layanan.petanibaru');
});

Route::middleware(['auth', 'PetaniMiddleware'])->group(function () {
    Route::post('/pengajuan-padi/store', [PengajuanPadiController::class, 'store'])->name('pengajuanpadi.store');

    // Route::get('dashboard', [UseController::class, 'index'])->name('dashboard');
    // Route::get('/', [HomeController::class, 'index'])->name('beranda');
});

Route::prefix("/admin")->middleware(['auth', 'AdminMiddleware'])->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');  
    Route::resource('padi', PadiController::class)->names('padi');
    Route::resource('berita', BeritaController::class)->names('berita');
    Route::resource('produk', ProdukController::class)->names('produk');
    Route::resource('produksi_beras', ProduksiBerasController::class)->names('produksi_beras');




    // Route::get('haha/dashboard', [AdminController::class, 'index'])->name('admin/dashboard');
    // Route lainnya tinggal tulis 'route-name' saja tanpa 'admin.' di awal
});

Route::middleware('auth')->group(function (): void {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
