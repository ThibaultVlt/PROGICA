@extends('index')

@section('title', 'Accueil')

@section('content')
    <h1 class="text-center">Bienvenue sur PROGICA</h1>
    <p class="text-center">Découvrez nos gîtes campagnards pour des séjours inoubliables.</p>

    <!-- Section des cartes -->
    <div class="row">
        @foreach ($gites as $gite)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $gite->image }}" class="card-img-top" alt="Gîte">
                    <div class="card-body">
                        <h5 class="card-title">{{ $gite->title }}</h5>
                        <p class="card-text">{{ Str::limit($gite->description, 100) }}</p>
                        <a href="{{ route('gites.show', $gite->id) }}" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
