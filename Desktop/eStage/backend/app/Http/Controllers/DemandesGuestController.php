<?php

namespace App\Http\Controllers;

use App\Models\DemandeCompte;
use Illuminate\Http\Request;

class DemandesGuestController extends Controller
{
    //
    public function demandeCompte(Request $request)
    {
        $credentials = $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "email" => "required",
            "telephone" => "required",
            "ppr" => "required",
            "typeCompte" => "required",
            "etablissement" => "required",
            "service" => "required",
        ]);

        $demandeCompte = DemandeCompte::create($credentials);

        return response([
            "type" => "success",
            "content" => "Votre demande a ete fait avec success 100%",
        ]);
    }
}
