<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Http\Request;

class VilleController extends Controller
{
    /**
     * Affiche la liste des villes
     */
    public function index()
    {
        $villes = Ville::all();
        return view('ville.index', compact('villes'));
    }

    /**
     * Affiche le formulaire de création d'une ville
     */
    public function create()
    {
        return view('ville.create');
    }

    /**
     * Enregistre une nouvelle ville
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:villes,nom|max:255'
        ]);

        Ville::create($request->all());
        return redirect()->route('ville.index')
            ->with('success', 'Ville ajoutée avec succès');
    }

    /**
     * Affiche les détails d'une ville spécifique
     */
    public function show(Ville $ville)
    {
        return view('ville.show', compact('ville'));
    }

    /**
     * Affiche le formulaire de modification d'une ville
     */
    public function edit(Ville $ville)
    {
        return view('ville.edit', compact('ville'));
    }

    /**
     * Met à jour une ville spécifique
     */
    public function update(Request $request, Ville $ville)
    {
        $request->validate([
            'nom' => 'required|unique:villes,nom,'.$ville->id.'|max:255'
        ]);

        $ville->update($request->all());
        return redirect()->route('ville.index')
            ->with('success', 'Ville modifiée avec succès');
    }

    /**
     * Supprime une ville spécifique
     */
    public function destroy(Ville $ville)
    {
        // Vérifie si la ville a des étudiants associés
        if($ville->etudiants()->count() > 0) {
            return redirect()->route('ville.index')
                ->with('error', 'Impossible de supprimer cette ville car elle contient des étudiants');
        }

        $ville->delete();
        return redirect()->route('ville.index')
            ->with('success', 'Ville supprimée avec succès');
    }
}