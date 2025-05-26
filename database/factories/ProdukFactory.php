<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_produk' => $this->faker->words(2, true),
            'kategori' => $this->faker->randomElement(['beras', 'pupuk', 'obat']),
            'harga' => $this->faker->numberBetween(10000, 100000),
            'stok' => $this->faker->numberBetween(10, 100),
            'satuan' => $this->faker->randomElement(['kg']),
            'gambar' => 'gambar_produk/YTWTwY7O8mPxxiqQPDVDJmUXpORPirX0qiSmRpYl.jpg', // default path dummy
        ];
    }
}
