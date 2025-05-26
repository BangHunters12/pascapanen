<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Petani;

class PetaniSeeder extends Seeder
{
    public function run(): void
    {
        Petani::factory()->count(10)->create();
    }
}
