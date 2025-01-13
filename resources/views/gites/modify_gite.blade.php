@extends('index')

@section('title', 'Modifier un Gîte')

@section('content')
  <h1 class="text-center">Modifier un Gîte</h1>
  <!-- Affichage des messages de succès et d'erreurs -->
  @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif
  <form id="update-form" action="{{ route('gites.update', $gite->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('POST')
      <!-- Champs généraux -->
      <div class="mb-3">
          <label for="title" class="form-label">Nom du Gîte</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $gite->title) }}">
          @error('title')
            <div class="alert alert-danger mt-2 p-1">
              <p class="m-0">Champ obligatoire</p>
            </div>
          @enderror
      </div>
      <!-- Description -->
      <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description">{{ old('description', $gite->description) }}</textarea>
          @error('description')
            <div class="alert alert-danger mt-2 p-1">
              <p class="m-0">Champ obligatoire</p>
            </div>
          @enderror
      </div>
      <!-- Prénom du propriétaire -->
      <div class="mb-3">
          <label for="first_name" class="form-label">Prénom du propriétaire</label>
          <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $gite->owner ? $gite->owner->first_name : '') }}">
          @error('first_name')
            <div class="alert alert-danger mt-2 p-1">
              <p class="m-0">Champ obligatoire</p>
            </div>
          @enderror
      </div>
      <!-- Nom de famille du propriétaire -->
      <div class="mb-3">
          <label for="last_name" class="form-label">Nom du propriétaire</label>
          <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $gite->owner ? $gite->owner->last_name : '') }}">
          @error('last_name')
            <div class="alert alert-danger mt-2 p-1">
              <p class="m-0">Champ obligatoire</p>
            </div>
          @enderror
      </div>
      <!-- Numéro de téléphone du propriétaire -->
      <div class="mb-3">
          <label for="phone_number" class="form-label">Numéro de téléphone du propriétaire</label>
          <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $gite->owner ? $gite->owner->phone_number : '') }}">
          @error('phone_number')
            <div class="alert alert-danger mt-2 p-1">
              <p class="m-0">Champ obligatoire</p>
            </div>
          @enderror
      </div>
      <!-- Ville -->
      <div class="mb-3">
        <label for="ville_id" class="form-label">Ville</label>
        <select class="form-control" id="ville_id" name="ville_id">
          <option value="">-- Sélectionnez une ville --</option>
          @foreach ($villes as $ville)
          <option value="{{ $ville->id }}" {{ $ville->id == old('ville_id', $gite->ville_id) ? 'selected' : '' }}>{{ $ville->name }}</option>
          @endforeach
        </select>
        @error('ville_id')
        <div class="alert alert-danger mt-2 p-1">
          <p class="m-0">Champ obligatoire</p>
        </div>
      @enderror
      </div>
      <!-- Surface -->
      <div class="mb-3">
          <label for="surface" class="form-label">Surface (m²)</label>
          <input type="number" class="form-control" id="surface" name="surface" value="{{ old('surface', $gite->surface) }}">
          @error('surface')
            <div class="alert alert-danger mt-2 p-1">
              <p class="m-0">Champ obligatoire</p>
            </div>
          @enderror
      </div>
      <!-- Nombre de Chambres -->
      <div class="mb-3">
          <label for="bedrooms" class="form-label">Nombre de Chambres</label>
          <input type="number" class="form-control" id="bedrooms" name="bedrooms" value="{{ old('bedrooms', $gite->bedrooms) }}">
          @error('bedrooms')
            <div class="alert alert-danger mt-2 p-1">
              <p class="m-0">Champ obligatoire</p>
            </div>
          @enderror
      </div>
      <!-- Nombre de Couchages -->
      <div class="mb-3">
          <label for="bed" class="form-label">Nombre de Couchages</label>
          <input type="number" class="form-control" id="bed" name="bed" value="{{ old('bed', $gite->bed) }}">
          @error('bed')
            <div class="alert alert-danger mt-2 p-1">
              <p class="m-0">Champ obligatoire</p>
            </div>
          @enderror
      </div>
      <!-- Animaux -->
      <div class="mb-3">
          <label for="pets" class="form-label">Accepte les Animaux</label>
          <select class="form-control" id="pets" name="pets">
              <option value="1" {{ old('pets', $gite->pets) == 1 ? 'selected' : '' }}>Oui</option>
              <option value="0" {{ old('pets', $gite->pets) == 0 ? 'selected' : '' }}>Non</option>
          </select>
          @error('pets')
            <div class="alert alert-danger mt-2 p-1">
              <p class="m-0">Champ obligatoire</p>
            </div>
          @enderror
      </div>
      <div class="mb-3">
          <label for="price" class="form-label">Prix (€)</label>
          <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $gite->price) }}">
          @error('price')
            <div class="alert alert-danger mt-2 p-1">
              <p class="m-0">Champ obligatoire</p>
            </div>
          @enderror
      </div>
      <!-- Équipements -->
      <fieldset class="mb-3">
          <legend>Équipements</legend>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="dishwasher" name="dishwasher" {{ old('dishwasher', $gite->dishwasher) ? 'checked' : '' }}>
              <label class="form-check-label" for="dishwasher">
                  Lave-vaisselle
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="washing_machine" name="washing_machine" {{ old('washing_machine', $gite->washing_machine) ? 'checked' : '' }}>
              <label class="form-check-label" for="washing_machine">
                  Lave-linge
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="air_conditioning" name="air_conditioning" {{ old('air_conditioning', $gite->air_conditioning) ? 'checked' : '' }}>
              <label class="form-check-label" for="air_conditioning">
                  Climatisation
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="tv" name="tv" {{ old('tv', $gite->tv) ? 'checked' : '' }}>
              <label class="form-check-label" for="tv">
                  TV
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="terrace" name="terrace" {{ old('terrace', $gite->terrace) ? 'checked' : '' }}>
              <label class="form-check-label" for="terrace">
                  Terrasse
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="barbecue" name="barbecue" {{ old('barbecue', $gite->barbecue) ? 'checked' : '' }}>
              <label class="form-check-label" for="barbecue">
                  Barbecue
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="private_pool" name="private_pool" {{ old('private_pool', $gite->private_pool) ? 'checked' : '' }}>
              <label class="form-check-label" for="private_pool">
                  Piscine privée
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="shared_pool" name="shared_pool" {{ old('shared_pool', $gite->shared_pool) ? 'checked' : '' }}>
              <label class="form-check-label" for="shared_pool">
                  Piscine partagée
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="tennis" name="tennis" {{ old('tennis', $gite->tennis) ? 'checked' : '' }}>
              <label class="form-check-label" for="tennis">
                  Tennis
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="tennis_table" name="tennis_table" {{ old('tennis_table', $gite->tennis_table) ? 'checked' : '' }}>
              <label class="form-check-label" for="tennis_table">
                  Ping-pong
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="linen_rental" name="linen_rental" {{ old('linen_rental', $gite->linen_rental) ? 'checked' : '' }}>
              <label class="form-check-label" for="linen_rental">
                  Location de linge
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="end_cleaning" name="end_cleaning" {{ old('end_cleaning', $gite->end_cleaning) ? 'checked' : '' }}>
              <label class="form-check-label" for="end_cleaning">
                  Ménage fin de séjour
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="internet" name="internet" {{ old('internet', $gite->internet) ? 'checked' : '' }}>
              <label class="form-check-label" for="internet">
                  Internet
              </label>
          </div>
      </fieldset>
      <!-- Section pour les photos -->
      <div class="mb-3">
        <label for="photos" class="form-label">Photos du gîte</label>
        <input type="file" class="form-control" id="photos" name="photos[]" multiple accept="image/*">
        @error('photos')
          <div class="alert alert-danger mt-2 p-1">
            <p class="m-0">Champ obligatoire</p>
          </div>
        @enderror
      </div>
    </form>
      <!-- Suppression des photos -->
      @if($gite->photos)
          <h4>Photos actuelles</h4>
          @foreach(json_decode($gite->photos, true) as $index => $photo)
          <div class="photo-item">
              <img src="{{ asset('storage/' . $photo) }}" class="img-thumbnail" alt="Gite">
              <!-- Formulaire pour supprimer la photo -->
              <form id="form-{{$index}}" action="{{ route('gites.deletePhoto', ['giteId' => $gite->id, 'photoIndex' => $index]) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button id="update-button" type="submit" class="btn btn-danger btn-sm" form="form-{{$index}}">Supprimer la photo</button>
              </form>
          </div>
          @endforeach
      @endif
      <!-- Bouton validation -->
      <button type="submit" class="btn btn-primary mt-2" form="update-form">Mettre à jour le Gîte</button>
@endsection
