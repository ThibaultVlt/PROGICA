<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gite extends Model
{
    use HasFactory;

    /**
     * Liste des champs autorisés
     *
     * @var array
     */
    protected $fillable = [
      'title',
      'description',
      'surface',
      'bedrooms',
      'bed',
      'pets',
      'dishwasher',
      'washing_machine',
      'air_conditioning',
      'tv',
      'terrace',
      'barbecue',
      'private_pool',
      'shared_pool',
      'tennis',
      'tennis_table',
      'end_cleaning',
      'linen_rental',
      'internet',
      'price',
      'ville_id',
      'photos',
      'owner_id',
  ];

  /**
   * Convertir automatiquement le champ 'photos' en un tableau
   *
   * @var array
   */
  protected $casts = [
    'photos' => 'array',
  ];

  /**
   * Relation entre la table Gîte et la table Ville
   *
   * @return void
   */
  public function ville()
  {
      return $this->belongsTo(Ville::class);  // Une ville appartient à un gîte
  }

  /**
   * RElation entre la table Gite et Owner (Propriétaire)
   *
   * @return void
   */
    public function owner()
  {
      return $this->belongsTo(Owner::class); //Un Gite appartient à un Propriétaire
  }
}
