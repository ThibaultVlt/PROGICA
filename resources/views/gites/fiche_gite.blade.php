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
