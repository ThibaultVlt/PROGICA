<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'
    ];

    /**
     * Relation entre une ville et plusieurs Gîtes
     *
     * @return void
     */
    public function gites()
    {
        return $this->hasMany(Gite::class);  // Une ville peut avoir plusieurs gîtes
    }
}
