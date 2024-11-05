<?php

namespace Database\Seeders;

use App\Models\Ville;
use Illuminate\Database\Seeder;

class VilleSeeder extends Seeder
{
    public function run()
    {
        // Crée 10 villes fictives
        Ville::factory()->count(10)->create();
    }
}
