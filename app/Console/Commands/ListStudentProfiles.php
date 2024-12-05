<?php

namespace App\Console\Commands;

use App\Models\Etudiant;
use Illuminate\Console\Command;

class ListStudentProfiles extends Command
{
    protected $signature = 'students:list';
    protected $description = 'List all student profiles';

    public function handle()
    {
        $etudiants = Etudiant::with(['user', 'ville'])->get();

        if ($etudiants->isEmpty()) {
            $this->info('Aucun étudiant trouvé');
            return;
        }

        $this->info("\nListe des étudiants :");
        $this->table(
            ['ID', 'Nom', 'Email', 'Ville', 'User ID'],
            $etudiants->map(function ($etudiant) {
                return [
                    $etudiant->id,
                    $etudiant->nom,
                    $etudiant->email,
                    $etudiant->ville->nom,
                    $etudiant->user_id
                ];
            })
        );
    }
}