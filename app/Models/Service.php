<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'etablissement',
        'service',
        'uo',
        'lib_reduit',
        'lib_complet'
    ];
}
