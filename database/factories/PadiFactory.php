<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Padi>
 */
class PadiFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_padi' => $this->faker->words(2, true), // contoh: "Padi Super"
            'warna' => $this->faker->randomElement(['kuning keemasan', 'hijau muda', 'coklat']),
            'bentuk' => $this->faker->randomElement(['bulat', 'lonjong', 'pipih']),
            'tekstur' => $this->faker->randomElement(['kasar', 'halus', 'sedang']),
            'harga' => $this->faker->randomFloat(2, 4000, 10000),
            'stok' => $this->faker->numberBetween(100, 10000),
            'gambar' => $this->faker->imageUrl(640, 480, 'padi', true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
