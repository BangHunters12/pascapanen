<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Padi;

class padiSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan folder gambar_padi tersedia di storage/public
        Storage::disk('public')->makeDirectory('gambar_padi');

        $dummyPath = 'gambar_padi/3IOhaUqOm1ssnhA5N94N3BHyaTCfs83yPpFL4Smy.jpg';
        $source = public_path('images/3IOhaUqOm1ssnhA5N94N3BHyaTCfs83yPpFL4Smy.jpg'); // Pastikan kamu punya dummy.jpg di public/images

        // Salin dummy image kalau belum ada
        if (!Storage::disk('public')->exists($dummyPath)) {
            if (file_exists($source)) {
                Storage::disk('public')->put($dummyPath, file_get_contents($source));
            }
        }

        // Isi tabel Padi dengan 10 data dummy menggunakan factory
        Padi::factory()->count(10)->create([
            'gambar' => $dummyPath
        ]);
    }
}
