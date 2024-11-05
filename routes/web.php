<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\VilleController;
use Illuminate\Support\Facades\Route;

// Route de la page d'accueil, affichant les étudiants
Route::get('/', [EtudiantController::class, 'index']);

// Ressource complète pour les étudiants
Route::resource('etudiant', EtudiantController::class);

// Ressource complète pour les villes
Route::resource('ville', VilleController::class);
