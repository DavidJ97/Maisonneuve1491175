@extends('layouts.app')
@section('titre', 'Modifier l\'étudiant')

@section('contenu')
    <div class="card">
        <div class="card-header">
            <h2>Modifier l'étudiant</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('etudiant.update', $etudiant->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" 
                           value="{{ old('nom', $etudiant->nom) }}">
                </div>

                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" 
                           value="{{ old('adresse', $etudiant->adresse) }}">
                </div>

                <div class="mb-3">
                    <label for="telephone" class="form-label">Téléphone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" 
                           value="{{ old('telephone', $etudiant->telephone) }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" 
                           value="{{ old('email', $etudiant->email) }}">
                </div>

                <div class="mb-3">
                    <label for="date_de_naissance" class="form-label">Date de naissance</label>
                    <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" 
                           value="{{ old('date_de_naissance', $etudiant->date_de_naissance) }}">
                </div>

                <div class="mb-3">
                    <label for="ville_id" class="form-label">Ville</label>
                    <select class="form-select" id="ville_id" name="ville_id">
                        @foreach($villes as $ville)
                            <option value="{{ $ville->id }}" 
                                {{ (old('ville_id', $etudiant->ville_id) == $ville->id) ? 'selected' : '' }}>
                                {{ $ville->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="{{ route('etudiant.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
@endsection