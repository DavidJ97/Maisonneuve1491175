@extends('layouts.app')

@section('titre', 'Connexion')

@section('contenu')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">  
            <div class="card-header">Connexion</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                    </div>

                    <div class="text-center">
                        <p>Pas encore de compte? <a href="{{ route('register') }}">S'inscrire</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection