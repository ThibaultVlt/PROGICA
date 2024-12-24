@extends('index') {{-- Hérite de index.blade.php --}}

@section('title', 'Liste des Gîtes')

@section('content')
    <h1 class="text-center">Liste des Gîtes</h1>

    <!-- Bouton "Ajouter un gîte" -->
    <div class="d-flex justify-content-end mb-3">
        <a href="/gites/create" class="btn btn-success">Ajouter un gîte</a>
    </div>

    <!-- Tableau des gîtes -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
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
                <tr>
                    <td><a href="{{ route('gites.show', $gite->id) }}" class="btn btn-primary btn-sm">Voir la fiche</a></td>
                    <td>{{ $gite->title }}</td>
                    <td>{{ $gite->ville->name }}</td>
                    <td>{{ $gite->surface }}</td>
                    <td>{{ $gite->bedrooms }}</td>
                    <td>{{ $gite->bed }}</td>
                    <td>{{ $gite->pets ? 'Oui' : 'Non' }}</td>
                    <td>
                        <ul>
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
                        <a href="/gites/{{ $gite->id }}/edit" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="/gites/{{ $gite->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection
