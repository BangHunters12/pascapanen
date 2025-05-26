<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PadiFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_padi' => $this->faker->word() . ' Padi',
            'warna' => $this->faker->safeColorName(),
            'bentuk' => $this->faker->randomElement(['Bulat', 'Lonjong', 'Panjang']),
            'tekstur' => $this->faker->randomElement(['Halus', 'Kasar', 'Sedang']),
            'harga' => $this->faker->numberBetween(5000, 25000),
            'gambar' => 'gambar_padi/3IOhaUqOm1ssnhA5N94N3BHyaTCfs83yPpFL4Smy.jpg', // akan diganti/override oleh seeder jika perlu
        ];
    }
}
