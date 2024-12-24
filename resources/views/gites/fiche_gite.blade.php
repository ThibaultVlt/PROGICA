@extends('index')

@section('title', 'Fiche du Gîte')

@section('content')
    <h1 class="text-center">{{ $gite->title }}</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Description :</strong> {{ $gite->description }}</p>
            <p><strong>Surface :</strong> {{ $gite->surface }} m²</p>
            <p><strong>Chambres :</strong> {{ $gite->bedrooms }}</p>
            <p><strong>Couchages :</strong> {{ $gite->bed }}</p>
            <p><strong>Animaux acceptés :</strong> {{ $gite->pets ? 'Oui' : 'Non' }}</p>
            <p><strong>Prix :</strong> {{ $gite->price }} €</p>
            <!-- Ajoute d'autres détails si nécessaire -->
        </div>
    </div>
@endsection
