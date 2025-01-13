<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    /**
     * Liste des champs autorisés.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
    ];

    /**
     * Relation : Un propriétaire peut avoir plusieurs gîtes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gites()
    {
        return $this->hasMany(Gite::class);
    }
}
