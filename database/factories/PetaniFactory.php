<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class PetaniFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_lengkap' => $this->faker->name(),
            'username' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'gender' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'no_telp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'logo' => null, // atau bisa dummy string 'default.jpg'
            'password' => Hash::make('password'), // password default
            'role' => $this->faker->randomElement(['admin', 'petani']),
        ];
    }
}
