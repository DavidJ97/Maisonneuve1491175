<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FileDocumentController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;

// Route de langue (doit être avant les autres routes)
Route::get('lang/{locale}', [LocalizationController::class, 'setLang'])->name('lang');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware(['auth', 'web'])->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    
    Route::resources([
        'articles' => ArticleController::class,
        'etudiant' => EtudiantController::class,
        'villes' => VilleController::class,
        'documents' => FileDocumentController::class
    ]);

    Route::get('documents/{document}/download', [FileDocumentController::class, 'download'])
        ->name('documents.download');
});