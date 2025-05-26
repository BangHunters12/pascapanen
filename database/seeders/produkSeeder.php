<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Produk;

class produkSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan direktori untuk gambar produk ada
        Storage::disk('public')->makeDirectory('gambar_produk');

        $dummyPath = 'gambar_produk/YTWTwY7O8mPxxiqQPDVDJmUXpORPirX0qiSmRpYl.jpg';
        $source = public_path('images/YTWTwY7O8mPxxiqQPDVDJmUXpORPirX0qiSmRpYl.jpg'); // Pastikan dummy.jpg ada di public/images

        // Salin dummy gambar ke storage kalau belum ada
        if (!Storage::disk('public')->exists($dummyPath)) {
            if (file_exists($source)) {
                Storage::disk('public')->put($dummyPath, file_get_contents($source));
            }
        }

        // Buat 10 produk menggunakan factory
        Produk::factory()->count(10)->create([
            'gambar' => $dummyPath
        ]);
    }
}
