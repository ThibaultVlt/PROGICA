@extends('index')

@section('title', 'Ajouter un Gîte')

@section('content')
    <h1 class="text-center">Ajouter un Gîte</h1>

    <!-- Affichage des messages de succès et d'erreurs -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('gites.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Champs généraux -->
        <div class="mb-3">
            <label for="title" class="form-label">Nom du Gîte</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
        <label for="ville_id" class="form-label">Ville</label>
        <select class="form-control" id="ville_id" name="ville_id" required>
          <option value="">-- Sélectionnez une ville --</option>
            @foreach ($villes as $ville)
              <option value="{{ $ville->id }}">{{ $ville->name }}</option>
            @endforeach
        </select>
        </div>

        <div class="mb-3">
            <label for="surface" class="form-label">Surface (m²)</label>
            <input type="number" class="form-control" id="surface" name="surface" value="{{ old('surface') }}" required>
        </div>

        <div class="mb-3">
            <label for="bedrooms" class="form-label">Nombre de Chambres</label>
            <input type="number" class="form-control" id="bedrooms" name="bedrooms" value="{{ old('bedrooms') }}" required>
        </div>

        <div class="mb-3">
            <label for="bed" class="form-label">Nombre de Couchages</label>
            <input type="number" class="form-control" id="bed" name="bed" value="{{ old('bed') }}" required>
        </div>

        <div class="mb-3">
            <label for="pets" class="form-label">Accepte les Animaux</label>
            <select class="form-control" id="pets" name="pets">
                <option value="1" {{ old('pets') == 1 ? 'selected' : '' }}>Oui</option>
                <option value="0" {{ old('pets') == 0 ? 'selected' : '' }}>Non</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prix (€)</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
        </div>

        <!-- Equipements -->
        <fieldset class="mb-3">
            <legend>Équipements</legend>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="dishwasher" name="dishwasher" {{ old('dishwasher') ? 'checked' : '' }}>
                <label class="form-check-label" for="dishwasher">
                    Lave-vaisselle
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="washing_machine" name="washing_machine" {{ old('washing_machine') ? 'checked' : '' }}>
                <label class="form-check-label" for="washing_machine">
                    Lave-linge
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="air_conditioning" name="air_conditioning" {{ old('air_conditioning') ? 'checked' : '' }}>
                <label class="form-check-label" for="air_conditioning">
                    Climatisation
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tv" name="tv" {{ old('tv') ? 'checked' : '' }}>
                <label class="form-check-label" for="tv">
                    TV
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terrace" name="terrace" {{ old('terrace') ? 'checked' : '' }}>
                <label class="form-check-label" for="terrace">
                    Terrasse
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="barbecue" name="barbecue" {{ old('barbecue') ? 'checked' : '' }}>
                <label class="form-check-label" for="barbecue">
                    Barbecue
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="private_pool" name="private_pool" {{ old('private_pool') ? 'checked' : '' }}>
                <label class="form-check-label" for="private_pool">
                    Piscine privée
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="shared_pool" name="shared_pool" {{ old('shared_pool') ? 'checked' : '' }}>
                <label class="form-check-label" for="shared_pool">
                    Piscine partagée
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tennis" name="tennis" {{ old('tennis') ? 'checked' : '' }}>
                <label class="form-check-label" for="tennis">
                    Tennis
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tennis_table" name="tennis_table" {{ old('tennis_table') ? 'checked' : '' }}>
                <label class="form-check-label" for="tennis_table">
                    Ping-pong
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="linen_rental" name="linen_rental" {{ old('linen_rental') ? 'checked' : '' }}>
                <label class="form-check-label" for="linen_rental">
                    Location de linge
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="end_cleaning" name="end_cleaning" {{ old('end_cleaning') ? 'checked' : '' }}>
                <label class="form-check-label" for="end_cleaning">
                    Ménage fin de séjour
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="internet" name="internet" {{ old('internet') ? 'checked' : '' }}>
                <label class="form-check-label" for="internet">
                    Internet
                </label>
            </div>
        </fieldset>
        <!-- Section pour les photos -->
        <div class="mb-3">
          <label for="photos" class="form-label">Photos du gîte</label>
          <input type="file" class="form-control" id="photos" name="photos[]" multiple accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter le Gîte</button>
    </form>
@endsection
