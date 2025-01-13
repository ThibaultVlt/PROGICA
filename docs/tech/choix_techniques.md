# Choix techniques

Le projet utilise les technologies suivantes :

- **Laravel** : Framework PHP pour la gestion des routes, des modèles et des contrôleurs.
- **Laragon** : Environement de développement.
- **PHP 8.4** : Langage utilisé pour la logique backend.
- **Apache 2.4** : Serveur web utilisé.
- **MySQL 8.4** : Base de données relationnelle utilisée.

Des librairies tierces comme **Bootstrap** (pour le front-end) est également utilisées.

## Exemples

### Model

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    /**
     * Liste des champs autorisés.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
    ];

    /**
     * Relation : Un propriétaire peut avoir plusieurs gîtes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gites()
    {
        return $this->hasMany(Gite::class);
    }
}
```

### Vue

```php
@extends('index')

@section('title', 'Fiche du Gîte')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center">{{ $gite->title }}</h1>

        <div class="d-flex flex-column align-content-center">
          <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
          @if($gite->photos && count(json_decode($gite->photos)) > 0)
            <div class="carousel-inner w-50 mx-auto" width="500" height="350">
              @foreach(json_decode($gite->photos) as $key => $photo)
              <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $photo) }}" class="d-block" alt="Illustrations du gîte">
              </div>
            @endforeach
            @else
              <p>Aucune photo disponible pour ce gîte.</p>
            @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon bg-black" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
              <span class="carousel-control-next-icon bg-black" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <!-- Affichage de la description du gîte -->
          <div class="mt-3">
            <p class="text-center"><strong>Description:</strong> {{ $gite->description }}</p>
            <div class="d-flex justify-content-around">
              <p><strong>Surface:</strong> {{ $gite->surface }} m²</p>
              <p><strong>Nombre de chambres:</strong> {{ $gite->bedrooms }}</p>
              <p><strong>Nombre de couchages:</strong> {{ $gite->bed }}</p>
              <p ><strong>Ville:</strong> {{ $gite->ville->name }}</p> <!-- Affichage de la ville -->
            </div>
          </div>
          <div class="d-flex justify-content-around mt-3">
              <!-- Liste des équipements -->
              <ul>
                  <h3 class="text-decoration-underline fs-5">Équipements</h3>
                  @if($gite->dishwasher)
                    <li>Lave-vaisselle</li>
                  @endif
                  @if($gite->washing_machine)
                    <li>Lave-linge</li>
                  @endif
                  @if($gite->air_conditioning)
                    <li>Climatisation</li>
                  @endif
                  @if($gite->tv)
                    <li>TV</li>
                  @endif
                  @if($gite->terrace)
                    <li>Terrasse</li>
                  @endif
                  @if($gite->barbecue)
                    <li>Barbecue</li>
                  @endif
                  @if($gite->private_pool)
                    <li>Piscine privée</li>
                  @endif
                  @if($gite->shared_pool)
                    <li>Piscine partagée</li>
                  @endif
                  @if($gite->tennis)
                    <li>Tennis</li>
                  @endif
                  @if($gite->tennis_table)
                    <li>Ping-pong</li>
                  @endif
                  @if($gite->linen_rental)
                    <li>Location de linge</li>
                  @endif
                  @if($gite->end_cleaning)
                    <li>Ménage fin de séjour</li>
                  @endif
                  @if($gite->internet)
                    <li>Internet</li>
                  @endif
                </ul>
              <div>
                <h4 class="text-decoration-underline fs-5">Contact :</h4>
                  @if($gite->owner)
                    <p><strong>Nom du propriétaire :</strong> {{ $gite->owner->first_name }}</p>
                    <p><strong>Numéro de téléphone :</strong> {{ $gite->owner->phone_number }}</p>
                  @else
                    <p>Aucun propriétaire associé à ce gîte.</p>
                  @endif
                </div>
              </div>
              <div>
                <p class="text-end"><strong>Prix hebdomadaire :</strong><br>
                <strong class="fs-1 me-3">{{ $gite->price }} €</strong></p>
              </div>
        </div>

        <!-- Actions -->
        <div class="mt-4">
            <a href="{{ route('gites.index') }}" class="btn btn-primary">Retour à la liste</a>
        </div>
    </div>
@endsection

```

### Controller

```php

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
}
```

### Route

```php
Route::get('/', function () {
  $gites = App\Models\Gite::all(); //Récupère les données des gîtes
  return view('gites.card_gites', compact('gites'));
});

```
