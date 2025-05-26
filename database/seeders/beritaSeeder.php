<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        // Buat direktori gambar_berita jika belum ada
        Storage::disk('public')->makeDirectory('gambar_berita');

        // Pastikan gambar dummy tersedia
        $gambarPath = 'gambar_berita/dummy.jpg';
        $sourceDummy = public_path('images/IUNkaynWk4fgvvj4oIVjCvnjbsWDzeq4fVAcSlD1.jpg'); // Pastikan file ini tersedia

        if (!Storage::disk('public')->exists($gambarPath)) {
            if (file_exists($sourceDummy)) {
                Storage::disk('public')->put($gambarPath, file_get_contents($sourceDummy));
            } else {
                $gambarPath = null; // Kosongkan jika tidak ada gambar
            }
        }

        // Buat 10 data berita menggunakan factory dengan gambar dummy
        Berita::factory()->count(10)->create([
            'gambar' => $gambarPath,
        ]);
    }
}
