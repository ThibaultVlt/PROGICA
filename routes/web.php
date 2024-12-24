<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  $gites = App\Models\Gite::all(); // Simule ou récupère les données des gîtes
  return view('gites.card_gites', compact('gites'));
});



// Affiche la liste des gîtes
Route::get('/gites', [GiteController::class, 'index'])->name('gites.index');

// Affiche le formulaire pour ajouter un gîte
Route::get('/gites/create', [GiteController::class, 'create'])->name('gites.create');

// Enregistre un nouveau gîte
Route::post('/gites', [GiteController::class, 'store'])->name('gites.store');

// Affiche une fiche spécifique
Route::get('/gites/{id}', [GiteController::class, 'show'])->name('gites.show');

// Affiche le formulaire pour modifier un gîte
Route::get('/gites/{id}/edit', [GiteController::class, 'edit'])->name('gites.edit');

// Met à jour les informations d’un gîte
Route::put('/gites/{id}', [GiteController::class, 'update'])->name('gites.update');

// Supprime un gîte
Route::delete('/gites/{id}', [GiteController::class, 'destroy'])->name('gites.destroy');
