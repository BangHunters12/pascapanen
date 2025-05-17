<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PadiController;
use App\Http\Controllers\PengajuanPadiController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('beranda');
// Route::get('/berita/{id}', [HomeController::class, 'show'])->name('berita.show');
Route::get('/penjualan-padi', action: [PengajuanPadiController::class, 'penjualanView'])->name('user.penjualan_padi.penjualanpadi');


Route::middleware(['auth', 'PetaniMiddleware'])->group(function () {
        // Route::get('/berita/{id}', [HomeController::class, 'show'])->name('berita.show');

    // Route::get('dashboard', [UseController::class, 'index'])->name('dashboard');
    // Route::get('/', [HomeController::class, 'index'])->name('beranda');
    // Route::get('/berita/{id}', [HomeController::class, 'show'])->name('berita.show');
});

Route::prefix("/admin")->middleware(['auth', 'AdminMiddleware'])->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');  
    Route::resource('padi', PadiController::class)->names('padi');
    Route::resource('berita', BeritaController::class)->names('berita');
    Route::resource('produk', ProdukController::class)->names('produk');
    // Route::get('haha/dashboard', [AdminController::class, 'index'])->name('admin/dashboard');
    // Route lainnya tinggal tulis 'route-name' saja tanpa 'admin.' di awal
});

Route::middleware('auth')->group(function (): void {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
