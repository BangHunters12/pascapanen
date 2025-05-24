<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(6),
            'isi' => $this->faker->paragraphs(3, true),
            'gambar' => null, // bisa juga pakai: $this->faker->imageUrl(640, 480, 'news', true)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
