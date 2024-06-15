<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // protected $fillable = ['designation', 'prix', 'quantite'];
    public $timestamps = false;

    use HasFactory;
    public function commandes() {
        $this->hasMany(Commande::class);
    }
}
