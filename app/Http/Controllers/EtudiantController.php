<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiant.index', compact('etudiants'));
    }

    public function create()
    {
        $villes = Ville::all();
        return view('etudiant.create', compact('villes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'date_de_naissance' => 'required|date',
            'ville_id' => 'required'
        ]);

        Etudiant::create($request->all());
        return redirect()->route('etudiant.index')
            ->with('success', 'Étudiant ajouté avec succès');
    }

    public function show(Etudiant $etudiant)
    {
        return view('etudiant.show', compact('etudiant'));
    }

    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        return view('etudiant.edit', compact('etudiant', 'villes'));
    }

    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'date_de_naissance' => 'required|date',
            'ville_id' => 'required'
        ]);

        $etudiant->update($request->all());
        return redirect()->route('etudiant.index')
            ->with('success', 'Étudiant modifié avec succès');
    }

    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiant.index')
            ->with('success', 'Étudiant supprimé avec succès');
    }
}