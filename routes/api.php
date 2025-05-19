<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\BeritaController;
use App\Http\Controllers\Api\PetaniController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{id}', [BeritaController::class, 'show']);


Route::post('/petani/login', [LoginController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/petani/profile', [PetaniController::class, 'profile']);
    Route::put('/petani/update-profile', [PetaniController::class, 'updateProfile']);
});