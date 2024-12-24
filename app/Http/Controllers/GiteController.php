<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gite;
use App\Models\Ville;

class GiteController extends Controller
{
    /**
     * Récupération des gites et mise en liste de 10 avec pagination
     *
     * @return void
     */
    public function index()
    {
        $gites = Gite::paginate(10); // Récupération de tous les gîtes avec pagination par lot de 10 gîtes
        return view('gites.liste_gites', compact('gites'));
    }

    /**
     * Création d'une fiche de gîte
     *
     * @return void
     */
    public function create()
    {
      $villes = Ville::all(); // Récupération de toutes les villes
      return view('gites.create_gite', compact('villes'));
    }

    /**
     * Enregistrer un nouveau gîte
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {

      // Ajouter des valeurs par défaut pour les checkboxes
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
    ]);

          Gite::create($validated);
          return redirect()->route('gites.index')->with('success', 'Vous venez d\'ajouter un gîte.');
    }

    /**
     * Afficher le formulaire pour modifier un gîte
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
     * Mettre à jour les informations d'un gîte
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
       // Ajouter des valeurs par défaut pour les checkboxes
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
        ]);

        //Trouver le gîte par ID ou erreur
        $gite = Gite::findOrFail($id);

        //Mise à jour des données
        $gite->update($validated);

        //Redirection avec message de succès
        return redirect()->route('gites.index')->with('success', 'Vous avez modifié le gîte.');
    }


    /**
     * Supprimer un gîte
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        $gite = Gite::findOrFail($id);
        $gite->delete();

        return redirect()->route('gites.index')->with('success', 'Vous avez supprimé le gîte');
    }
}
