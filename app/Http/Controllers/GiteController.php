<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gite;
use App\Models\Ville;
use App\Models\Owner;
use Illuminate\Support\Facades\Storage;

class GiteController extends Controller
{
    /**
     *Récupération des gites et mise en liste de 10 avec pagination
     *
     * @return void
     */
    public function index(Request $request)
    {
        // Initialiser la requête pour récupérer les gîtes
        $query = Gite::query();

        // Filtrer par ville si un filtre est passé
        if ($request->has('ville_id') && $request->ville_id) {
            $query->where('ville_id', $request->ville_id);
        }

        // Filtrer par équipements si des équipements sont sélectionnés
        if ($request->has('equipments') && is_array($request->equipments)) {
            foreach ($request->equipments as $equipment) {
                // Vérifier si la colonne existe dans la table 'gites' et appliquer le filtre
                if (\Schema::hasColumn('gites', $equipment)) {
                    $query->where($equipment, true);
                }
            }
        }

        // Récupérer les gîtes filtrés
        $gites = $query->paginate(4);

        // Récupérer toutes les villes pour le filtre
        $villes = Ville::all();

        // Retourner la vue avec les gîtes et les villes disponibles
        return view('gites.liste_gites', compact('gites', 'villes'));
    }

    /**
     *Création d'une fiche de gîte
     *
     * @return void
     */
    public function create(Request $request)
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
        'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'phone_number' => 'required|string',
    ]);

    //Création du propriétaire
    $owner = Owner::firstOrCreate(
      [
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
      ],
      [
          'phone_number' => $request->phone_number,
      ]
    );

      //Transmission des photos Pour stockage des chemins en JSON
      if ($request->hasFile('photos')) {
        $photos = [];
          foreach ($request->file('photos') as $photo) {
              $photoPath = $photo->store('photos', 'public'); // Stockage des photos
              $photos[] = $photoPath;
        }
      }

      //Ajouter le propriétaire au gîte et la photo
      $validated['owner_id'] = $owner->id;
      $validated['photos'] = json_encode($photos);

      Gite::create($validated);
      return redirect()->route('gites.index');
    }

    /**
     *Afficher le formulaire pour modifier un gîte
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
      $gite = Gite::findOrFail($id); //Trouver le gîte ou renvoie une erreur 404
      $villes = Ville::all(); //Récupérer toutes les villes
      $owners = Owner::all(); //Récupérer tous les propriétaires
      return view('gites.modify_gite', compact('gite', 'villes', 'owners')); // Envoie le gîte et les villes à la vue
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|string',
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
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|string',
          ]);

        //Trouver le gîte par ID ou erreur
        $gite = Gite::findOrFail($id);

        $owner = Owner::firstOrCreate([
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'phone_number' => $request->phone_number,
        ]);

        // Ajout du propriétaire au gîte
      $validated['owner_id'] = $owner->id;

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

        //Redirection
        return redirect()->route('gites.index');
    }


    /**
     *Supprimer un gîte
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        $gite = Gite::findOrFail($id);

        //Supprimer les photos correspondant au gîte
        $photos = json_decode($gite->photos, true) ?? [];
        foreach ($photos as $photo) {
            Storage::disk('public')->delete($photo); // Suppression de la photo
        }

        //Supprimer le gite
        $gite->delete();

        return redirect()->route('gites.index');
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
}
