<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\BeritaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdukApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', action: [RegisterController::class, 'register']);
Route::post('/login', action: [LoginController::class, 'login']);

Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{id}', [BeritaController::class, 'show']);

// apiproduk
Route::prefix('produk')->group(function () {
    Route::get('/', [ProdukController::class, 'index']);
    Route::get('/{id}', [ProdukController::class, 'show']);
    Route::post('/', [ProdukController::class, 'store']);
    Route::post('/{id}', [ProdukController::class, 'update']); // Jika mobile sulit pakai PUT
    Route::delete('/{id}', [ProdukController::class, 'destroy']);
});