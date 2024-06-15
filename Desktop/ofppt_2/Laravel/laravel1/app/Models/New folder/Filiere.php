<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    public function stagiaires () {
        return $this->hasMany(Stagiaire::class);
    }

    public function modules () {
        return $this->belongsToMany(Module::class);
    }
}
