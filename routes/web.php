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
  $gites = App\Models\Gite::all(); //Récupère les données des gîtes
  return view('gites.card_gites', compact('gites'));
});



//Afficher la liste des gîtes et recherche de gîtes
Route::get('/gites', [GiteController::class, 'index'])->name('gites.index');

//Afficher le formulaire pour ajouter un gîte
Route::get('/gites/create', [GiteController::class, 'create'])->name('gites.create');

//Enregistrer un nouveau gîte
Route::post('/gites', [GiteController::class, 'store'])->name('gites.store');

//Afficher une fiche spécifique
Route::get('/gites/{id}', [GiteController::class, 'show'])->name('gites.show');

//Afficher le formulaire pour modifier un gîte
Route::get('/gites/{id}/edit', [GiteController::class, 'edit'])->name('gites.edit');

//Mettre à jour les informations d'un gîte
Route::post('/gites/{id}', [GiteController::class, 'update'])->name('gites.update');

//Supprimer une photo
Route::delete('gites/{giteId}/photos/{photoIndex}/delete', [GiteController::class, 'deletePhoto'])->name('gites.deletePhoto');

//Supprimer un gîte
Route::delete('/gites/{id}', [GiteController::class, 'destroy'])->where('id', '[0-9]+')->name('gites.destroy');
