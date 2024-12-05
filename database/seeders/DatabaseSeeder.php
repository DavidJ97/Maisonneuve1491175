<?php
namespace Database\Seeders;

use App\Models\Ville;
use App\Models\Etudiant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Créer 15 villes d'abord
        Ville::factory(15)->create();
        
        // Créer 100 étudiants avec leurs users associés
        Etudiant::factory(100)
            ->create();

    }
}