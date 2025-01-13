@extends('index') {{-- Hérite de index.blade.php --}}

@section('title', 'Liste des Gîtes')

@section('content')
    <h1 class="text-center">Liste des Gîtes</h1>
      <!-- FORMULAIRE DE RECHERCHE -->
    <form method="GET" action="{{ route('gites.index') }}">
      <div class="d-flex justify-content-center gap-3 mb-2">
        <div class="d-flex gap-2 flex-lg-row flex-column">
          <!-- Sélecteur de ville -->
          <div>
              <select name="ville_id" class="form-control">
                  <option value="">Ville</option>
                  @foreach ($villes as $ville)
                      <option value="{{ $ville->id }}" {{ request()->input('ville_id') == $ville->id ? 'selected' : '' }}>{{ $ville->name }}</option>
                  @endforeach
              </select>
          </div>
          <!-- Section des équipements dans un menu déroulant avec sélection multiple -->
          <div class="mt-3">
            <div class="form-check">
            <label class="text-decoration-underline">Filtres :</label>
              @foreach (['pets', 'dishwasher', 'washing_machine', 'air_conditioning', 'tv', 'terrace', 'barbecue', 'private_pool', 'shared_pool', 'tennis', 'tennis_table', 'end_cleaning', 'linen_rental', 'internet'] as $equipment)
                  <div>
                      <input
                          type="checkbox"
                          name="equipments[]"
                          value="{{ $equipment }}"
                          id="{{ $equipment }}"
                          class="form-check-input"
                          {{ in_array($equipment, request()->input('equipments', [])) ? 'checked' : '' }}
                      >
                      <label for="{{ $equipment }}" class="form-check-label">
                          {{ ucfirst(str_replace('_', ' ', $equipment)) }}
                      </label>
                  </div>
              @endforeach
            </div>
          </div>
        </div>
        <div>
          <!-- Bouton de recherche -->
            <button type="submit" class="btn btn-primary my-2">Rechercher</button>
            <!-- Bouton "Ajouter un gîte" -->
            <a href="/gites/create" class="btn btn-success">Ajouter un gîte</a>
        </div>
      </div>
    </form>

    <!-- Tableau des gîtes -->
    <div class="table-responsive">
        <table class="table table-bordered border border-black">
        <thead class="table-dark">
            <tr class="text-center">
            <th>Fiche</th>
            <th>Nom</th>
            <th>Ville</th>
            <th>Surface (m²)</th>
            <th>Chambres</th>
            <th>Couchages</th>
            <th>Animaux</th>
            <th>Équipements</th>
            <th>Prix (€)</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($gites as $gite)
                <tr class="text-center align-middle">
                    <td><a href="{{ route('gites.show', $gite->id) }}" class="btn btn-primary btn-sm">Voir la fiche</a></td>
                    <td>{{ $gite->title }}</td>
                    <td>{{ $gite->ville->name }}</td>
                    <td>{{ $gite->surface }}</td>
                    <td>{{ $gite->bedrooms }}</td>
                    <td>{{ $gite->bed }}</td>
                    <td>{{ $gite->pets ? 'Oui' : 'Non' }}</td>
                    <td>
                        <ul class="list-unstyled ">
                            @if ($gite->dishwasher) <li>Lave-vaisselle</li> @endif
                            @if ($gite->washing_machine) <li>Lave-linge</li> @endif
                            @if ($gite->air_conditioning) <li>Climatisation</li> @endif
                            @if ($gite->tv) <li>TV</li> @endif
                            @if ($gite->terrace) <li>Terrasse</li> @endif
                            @if ($gite->barbecue) <li>Barbecue</li> @endif
                            @if ($gite->private_pool) <li>Piscine privée</li> @endif
                            @if ($gite->shared_pool) <li>Piscine partagée</li> @endif
                            @if ($gite->tennis) <li>Tennis</li> @endif
                            @if ($gite->tennis_table) <li>Ping-pong</li> @endif
                            @if ($gite->linen_rental) <li>Location de linge</li> @endif
                            @if ($gite->end_cleaning) <li>Ménage en fin de séjour</li> @endif
                            @if ($gite->internet) <li>Internet</li> @endif
                        </ul>
                    </td>
                    <td>{{ $gite->price }}</td>
                    <td>
                        <a href="/gites/{{ $gite->id }}/edit" class="btn btn-warning btn-sm mb-3">Modifier</a>
                        <form action="{{ route('gites.destroy', $gite->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
        <!-- Pagination des résultats -->
      {{ $gites->links() }}
    </div>
@endsection
