<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Gite;
use App\Models\Ville;


class GiteController extends Controller
{
    /**
     *Récupération des gites et mise en liste de 10 avec pagination
     *
     * @return void
     */
    public function index()
    {
        $gites = Gite::paginate(10); //Récupération de tous les gîtes
        $villes = Ville::all(); //Récupération des villes de la base de données
        return view('gites.liste_gites', compact('gites', 'villes'));
    }

    /**
     *Création d'une fiche de gîte
     *
     * @return void
     */
    public function create()
    {
      $villes = Ville::all(); //Récupération de toutes les villes
      return view('gites.create_gite', compact('villes'));
    }

    /**
     *Enregistrer un nouveau gîte
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
      //Ajouter des valeurs par défaut pour les checkboxes
    $request->merge([
      'dishwasher' => $request->has('dishwasher'),
      'washing_machine' => $request->has('washing_machine'),
      'air_conditioning' => $request->has('air_conditioning'),
      'tv' => $request->has('tv'),
      'terrace' => $request->has('terrace'),
      'barbecue' => $request->has('barbecue'),
      'private_pool' => $request->has('private_pool'),
      'shared_pool' => $request->has('shared_pool'),
      'tennis' => $request->has('tennis'),
      'tennis_table' => $request->has('tennis_table'),
      'end_cleaning' => $request->has('end_cleaning'),
      'linen_rental' => $request->has('linen_rental'),
      'internet' => $request->has('internet'),
  ]);

      $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'surface' => 'required|integer',
        'bedrooms' => 'required|integer',
        'bed' => 'required|integer',
        'pets' => 'required|boolean',
        'dishwasher' => 'boolean',
        'washing_machine' => 'boolean',
        'air_conditioning' => 'boolean',
        'tv' => 'boolean',
        'terrace' => 'boolean',
        'barbecue' => 'boolean',
        'private_pool' => 'boolean',
        'shared_pool' => 'boolean',
        'tennis' => 'boolean',
        'tennis_table' => 'boolean',
        'end_cleaning' => 'boolean',
        'linen_rental' => 'boolean',
        'internet' => 'boolean',
        'price' => 'required|integer',
        'ville_id' => 'required|exists:villes,id',
        'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

      //Transmission des photos Pour stockage des chemins en JSON
      if ($request->hasFile('photos')) {
        $photos = [];
          foreach ($request->file('photos') as $photo) {
              $photoPath = $photo->store('photos', 'public'); // Stockage des photos
              $photos[] = $photoPath;
        }
      }
      $validated['photos'] = json_encode($photos); //Enregistrement des photos dans la base de données

      Gite::create($validated);
      return redirect()->route('gites.index')->with('success', 'Vous venez d\'ajouter un gîte.');
    }

    /**
     *Afficher le formulaire pour modifier un gîte
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
      $gite = Gite::findOrFail($id); // Trouve le gîte ou renvoie une erreur 404
      $villes = Ville::all(); // Récupère toutes les villes
      return view('gites.modify_gite', compact('gite', 'villes')); // Envoie le gîte et les villes à la vue
    }

    /**
     *Mettre à jour les informations d'un gîte
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
       //Ajouter des valeurs par défaut pour les checkboxes
        $request->merge([
          'dishwasher' => $request->has('dishwasher'),
          'washing_machine' => $request->has('washing_machine'),
          'air_conditioning' => $request->has('air_conditioning'),
          'tv' => $request->has('tv'),
          'terrace' => $request->has('terrace'),
          'barbecue' => $request->has('barbecue'),
          'private_pool' => $request->has('private_pool'),
          'shared_pool' => $request->has('shared_pool'),
          'tennis' => $request->has('tennis'),
          'tennis_table' => $request->has('tennis_table'),
          'end_cleaning' => $request->has('end_cleaning'),
          'linen_rental' => $request->has('linen_rental'),
          'internet' => $request->has('internet'),
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'surface' => 'required|integer',
            'bedrooms' => 'required|integer',
            'bed' => 'required|integer',
            'pets' => 'required|boolean',
            'price' => 'required|integer',
            'ville_id' => 'required|exists:villes,id',
            'dishwasher' => 'nullable|boolean',
            'washing_machine' => 'nullable|boolean',
            'air_conditioning' => 'nullable|boolean',
            'tv' => 'nullable|boolean',
            'terrace' => 'nullable|boolean',
            'barbecue' => 'nullable|boolean',
            'private_pool' => 'nullable|boolean',
            'shared_pool' => 'nullable|boolean',
            'tennis' => 'nullable|boolean',
            'tennis_table' => 'nullable|boolean',
            'end_cleaning' => 'nullable|boolean',
            'linen_rental' => 'nullable|boolean',
            'internet' => 'nullable|boolean',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //Trouver le gîte par ID ou erreur
        $gite = Gite::findOrFail($id);

        //Récupérer les photos présentent dans la base de données
        $photos = json_decode($gite->photos, true) ?? [];

        //Transmission des photos Pour stockage des chemins en JSON
        if ($request->hasFile('photos')) {
          foreach ($request->file('photos') as $photo) {
              $photoPath = $photo->store('photos', 'public'); // Stockage des photos
              $photos[] = $photoPath; // Ajouter le chemin de la photo au tableau
          }
      }
      $validated['photos'] = json_encode($photos); //Mise en JSON des chemins vers les photos


        //Mise à jour des données
        $gite->update($validated);

        //Redirection avec message de succès
        return redirect()->route('gites.index')->with('success', 'Vous avez modifié le gîte.');
    }


    /**
     *Supprimer un gîte
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
      dd('destroy appelée', $id);
        $gite = Gite::findOrFail($id);
        $gite->delete();

        return redirect()->route('gites.index')->with('success', 'Vous avez supprimé le gîte');
    }

    /**
     *Voir le gîte (utile pour la fiche du gîte)
     */
    public function show($id)
    {
      $gite = Gite::with('ville')->findOrFail($id);

      return view('gites.fiche_gite', compact('gite'));
    }

    /**
     * Supprimer une photo
     *
     * @param Request $request
     * @param int $giteId
     * @param int $photoIndex
     * @return void
     */
    public function deletePhoto(Request $request, $giteId, $photoIndex)
    {
      dd('deletePhoto appelée', $giteId, $photoIndex);
      // Récupérer le gîte par son ID
      $gite = Gite::findOrFail($giteId);

      // Décoder les photos du gîte
      $photos = json_decode($gite->photos, true);

      if (!isset($photos[$photoIndex])) {
        return redirect()->route('gites.show', $gite->id)->with('error', 'Photo introuvable.');
      }
          // Supprimer la photo du tableau
          $photoPath = $photos[$photoIndex];

          // Supprimer le fichier de la photo du stockage
          Storage::disk('public')->delete($photoPath);

          // Retirer la photo du tableau
          unset($photos[$photoIndex]);

          // Mettre à jour la colonne photos avec le nouveau tableau
          $gite->photos = json_encode(array_values($photos));

          // Sauvegarder les modifications dans la base de données
          $gite->save();

          return redirect()->route('gites.show', $gite->id)->with('success', 'Photo supprimée avec succès!');
    }

    /**
     * Recherche
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
{
    // Commencer avec une requête sur le modèle Gite
    $query = Gite::query();

    // Filtrer par ville
    if ($request->has('ville_id') && $request->input('ville_id') != '') {
        $query->where('ville_id', $request->input('ville_id'));
    }

    // Liste des équipements
    $equipments = $request->input('equipments', []); // Récupérer les équipements sélectionnés

    // Appliquer les filtres pour chaque équipement sélectionné
    foreach ($equipments as $equipment) {
        $query->where('equipments', 'like', '%'.$equipment.'%');
    }

    // Récupérer les résultats filtrés
    $gites = $query->get();

    // Passer les résultats à la vue
    return view('gites.liste_gites', compact('gites', 'villes'));
}


}
