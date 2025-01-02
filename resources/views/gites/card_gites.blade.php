<!-- Envoi sur la vue index.blade.php -->
@extends('index')

<!-- Titre envoyé sur la vue index -->
@section('title', 'Accueil')

<!-- Section envoyé sur la vue index -->
@section('content')
    <h1 class="text-center">Bienvenue sur PROGICA</h1>
    <p class="text-center">Découvrez nos gîtes campagnards pour des séjours inoubliables.</p>

    <!-- Section des cartes -->
    <div class="row">
      <!-- Boucle permettant la récupération des données dans la base de données -->
        @foreach ($gites as $gite)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $gite->image }}" class="card-img-top" alt="Gîte">
                    <div class="card-body">
                        <h4 class="card-title">{{ $gite->title }}</h4>
                        <p class="card-text">{{ Str::limit($gite->description, 100) }}</p>
                        <strong class="text-decoration-underline">Équipements :</strong>
                        <ul class="list-unstyled d-flex flex-wrap gap-3">
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
                        <div class="d-flex justify-content-end align-items-end">
                          <a href="{{ route('gites.show', $gite->id) }}" class="btn btn-primary ">Voir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
