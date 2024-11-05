@extends('layouts.app')
@section('titre', 'Détails de l\'étudiant')

@section('contenu')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Détails de l'étudiant</h2>
            <a href="{{ route('etudiant.index') }}" class="btn btn-secondary">Retour</a>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Nom</dt>
                <dd class="col-sm-9">{{ $etudiant->nom }}</dd>

                <dt class="col-sm-3">Adresse</dt>
                <dd class="col-sm-9">{{ $etudiant->adresse }}</dd>

                <dt class="col-sm-3">Téléphone</dt>
                <dd class="col-sm-9">{{ $etudiant->telephone }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $etudiant->email }}</dd>

                <dt class="col-sm-3">Date de naissance</dt>
                <dd class="col-sm-9">{{ $etudiant->date_de_naissance }}</dd>

                <dt class="col-sm-3">Ville</dt>
                <dd class="col-sm-9">{{ $etudiant->ville->nom }}</dd>
            </dl>
            <div>
                <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-warning">Modifier</a>
            </div>
        </div>
    </div>
@endsection