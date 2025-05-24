<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class SewaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_sewa' => $this->faker->sentence(6),
            'harga_sewa' => $this->faker->randomFloat(2, 10000, 100000), // harga dalam Rupiah
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
