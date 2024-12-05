<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Console\Command;

class CreateStudentProfiles extends Command
{
    protected $signature = 'students:create-profiles';
    protected $description = 'Create student profiles for existing users';

    public function handle()
    {
        $users = User::whereDoesntHave('etudiant')->get();
        
        $this->info("Création des profils étudiants...\n");

        foreach ($users as $user) {
            $ville = Ville::inRandomOrder()->first();
            
            $etudiant = Etudiant::create([
                'nom' => $user->name,
                'email' => $user->email,
                'adresse' => '1 rue de LaPlace',
                'telephone' => '000-000-0000',
                'date_de_naissance' => now(),
                'ville_id' => $ville->id,
                'user_id' => $user->id
            ]);

            $this->info("Profil créé pour :");
            $this->table(
                ['ID', 'Nom', 'Email', 'Ville'],
                [[
                    $etudiant->id,
                    $etudiant->nom,
                    $etudiant->email,
                    $ville->nom
                ]]
            );
        }

        $this->info("\nTotal des profils créés : " . $users->count());
    }
}