<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'sigle',
        'email',
        'telephone',
        'adresse',
        'effectif_accueil',
        'status'
    ];
}
