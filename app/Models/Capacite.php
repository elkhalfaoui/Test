<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacite extends Model
{
    use HasFactory;
    protected $fillable =[
        'etablissement',
        'service',
        'filiere',
        'niveau_etudes',
        'capaciteP1',
        'capaciteP2',
        'capaciteP3',
    ];
}
