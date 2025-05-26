<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Padi;

class PadiSeeder extends Seeder
{
    /**
     * Jalankan seeder data padi.
     */
    public function run(): void
    {
        // Buat 15 data padi
        Padi::factory()->count(5)->create();
    }
}
