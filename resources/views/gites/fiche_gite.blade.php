@extends('index')

@section('title', 'Fiche du Gîte')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ $gite->title }}</h1>

        <div id="carouselControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner">
            @foreach(json_decode($gite->photos) as $key => $photo)
              <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $photo) }}" class="d-block w-100" alt="Illustrations du gîte">
              </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        <!-- Affichage de la description du gîte -->
        <div class="row">
            <div class="col-md-8">
                <p><strong>Description:</strong> {{ $gite->description }}</p>
                <p><strong>Surface:</strong> {{ $gite->surface }} m²</p>
                <p><strong>Nombre de chambres:</strong> {{ $gite->bedrooms }}</p>
                <p><strong>Nombre de couchages:</strong> {{ $gite->bed }}</p>
                <p><strong>Prix par nuit:</strong> {{ $gite->price }} €</p>
            </div>
            <div class="col-md-4">
                <p><strong>Ville:</strong> {{ $gite->ville->name }}</p> <!-- Affichage de la ville -->
            </div>
        </div>

        <!-- Liste des équipements -->
        <h3>Équipements</h3>
        <ul>
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

        <!-- Actions -->
        <div class="mt-4">
            <a href="{{ route('gites.index') }}" class="btn btn-primary">Retour à la liste</a>
        </div>
    </div>
@endsection
