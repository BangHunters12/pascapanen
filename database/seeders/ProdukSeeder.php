<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Jalankan seeder produk.
     */
    public function run(): void
    {
        // Buat 20 produk palsu untuk kebutuhan testing
        Produk::factory()->count(6)->create();
    }
}
