<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;

    public function telephone () {
        return $this->belongsTo(Telephone::class);
    }

    public function filiere () {
        return $this->belongsTo(Filiere::class);
    }

    public function modules () {
        return $this->belongsToMany(Module::class);
    }
}
