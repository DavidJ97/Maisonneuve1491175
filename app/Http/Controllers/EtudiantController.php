<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::with('ville')->paginate(10);
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
            'nom' => 'required|max:255',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:etudiants',
            'date_de_naissance' => 'required|date',
            'ville_id' => 'required|exists:villes,id'
        ]);

        $etudiant = Etudiant::create($request->all());
        return redirect()->route('etudiant.index')->with('success', __('messages.success_add'));
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
            'nom' => 'required|max:255',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:etudiants,email,'.$etudiant->id,
            'date_de_naissance' => 'required|date',
            'ville_id' => 'required|exists:villes,id'
        ]);

        $etudiant->update($request->all());
        return redirect()->route('etudiant.show', $etudiant)->with('success', __('messages.success_edit'));
    }

    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiant.index')->with('success', __('messages.success_delete'));
    }
}