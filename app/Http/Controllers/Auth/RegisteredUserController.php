<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create()
    {
        $villes = Ville::all();
        return view('auth.register', compact('villes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'adresse' => 'required|string',
            'telephone' => 'required|string',
            'date_de_naissance' => 'required|date',
            'ville_id' => 'required|exists:villes,id'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Etudiant::create([
            'nom' => $user->name,
            'email' => $user->email,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id,
            'user_id' => $user->id
        ]);

        return redirect()->route('login')
            ->with('success', 'Compte créé avec succès. Veuillez vous connecter.');
    }
}