<?php
namespace Database\Factories;

use App\Models\User;
use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    public function definition()
    {
        // Créer un nouvel utilisateur
        $user = User::factory()->create();
        
        return [
            'nom' => $user->name, // Utiliser le nom de l'utilisateur
            'adresse' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'email' => $user->email, // Utiliser l'email de l'utilisateur
            'date_de_naissance' => $this->faker->date(),
            'ville_id' => Ville::factory(),
            'user_id' => $user->id
        ];
    }
}