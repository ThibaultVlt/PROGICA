<!-- Envoi sur la vue index.blade.php -->
@extends('index')

<!-- Titre envoyé sur la vue index -->
@section('title', 'Accueil')

<!-- Section envoyé sur la vue index -->
@section('content')
    <h1 class="text-center">Bienvenue sur PROGICA</h1>
    <p class="text-center">Découvrez nos gîtes campagnards pour des séjours inoubliables.</p>

    <!-- Section des cartes -->
    <div class="row g-4">
      <!-- Boucle permettant la récupération des données dans la base de données -->
        @foreach ($gites as $gite)
            <div class="col-md-3 mb-2">
              <div class="card">
                <div>
                    @if($gite->photos)
                        <div id="carouselPhotos{{ $gite->id }}" class="carousel slide " data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach(json_decode($gite->photos, true) as $index => $photo)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $photo) }}" class="d-block w-100 card-img-top p-1" width="259" height="175" alt="Gite">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselPhotos{{ $gite->id }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselPhotos{{ $gite->id }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @else
                        <p class="text-center">Aucune photo disponible pour ce gîte.</p>
                    @endif
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center text-capitalize">{{ $gite->title }}</h4>
                    <p class="card-text">{{ Str::limit($gite->description, 100) }}</p>
                    <p class="text-center mb-0"><strong class="text-center text-decoration-underline">Équipements :</strong></p>
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
