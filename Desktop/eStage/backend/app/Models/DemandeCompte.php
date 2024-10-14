<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeCompte extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom",
        "prenom",
        "email",
        "telephone",
        "ppr",
        "typeCompte",
        "etablissement",
        "service",
        "status",
    ];
}
