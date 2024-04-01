<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'etablissement',
        'service',
        'date_debut',
        'date_fin',
        'sujet',
        'type_stage',
        'filiere',
        'etablissement_origine',
        'niveau_etudes',
        'status',
        'image'
    ];
    public function getImageURL()
    {
        if ($this->image) {
            return url('storage/' . $this->image);
        }

        return asset('./images/5856.jpg');
    }
}
