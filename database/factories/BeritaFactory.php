<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(6, true),
            'isi' => $this->faker->paragraphs(3, true),
            'gambar' => 'gambar_berita/IUNkaynWk4fgvvj4oIVjCvnjbsWDzeq4fVAcSlD1.jpg', 
        ];
    }
}
