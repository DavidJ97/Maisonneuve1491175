@extends('layouts.app')
@section('titre', 'Liste des étudiants')

@section('contenu')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Liste des étudiants</h1>
            
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Ville</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etudiants as $etudiant)
                        <tr>
                            <td>{{ $etudiant->nom }}</td>
                            <td>{{ $etudiant->email }}</td>
                            <td>{{ $etudiant->telephone }}</td>
                            <td>{{ $etudiant->ville->nom }}</td>
                            <td>
                                <a href="{{ route('etudiant.show', $etudiant->id) }}" class="btn btn-sm btn-info">Voir</a>
                                <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                <form action="{{ route('etudiant.destroy', $etudiant->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection