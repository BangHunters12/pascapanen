<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    public function definition(): array
    {
        $kategori = ['beras', 'pupuk', 'obat'];
        $satuan = ['kg', 'ltr', 'sak'];

        return [
            'nama_produk' => $this->faker->words(2, true), // contoh: "Beras Premium"
            'kategori' => $this->faker->randomElement($kategori),
            'harga' => $this->faker->randomFloat(2, 10000, 100000), // harga dalam Rupiah
            'stok' => $this->faker->numberBetween(50, 500),
            'satuan' => $this->faker->randomElement($satuan),
            'gambar' => null, // bisa diganti $this->faker->imageUrl()
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
