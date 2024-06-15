<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bladeController extends Controller
{
    //
    public function index() {
        return view('acceuil');
    }
    public function eleves() {
        $eleves = [
            ['code'=> 1, 'nom'=> "Elkhalfaoui", "prenom"=> "Zakaria", "group"=> "OFS204"],
            ['code'=> 2, 'nom'=> "Boukhris", "prenom"=> "Othmane", "group"=> "OFS204"],
            ['code'=> 3, 'nom'=> "Amekdouf", "prenom"=> "Ali", "group"=> "OFS204"],
            ['code'=> 4, 'nom'=> "Elkomissa", "prenom"=> "Moustapha", "group"=> "OFS204"],
        ];
        return view('List.eleve', ["eleves"=>$eleves]);
    }
    public function modules() {
        $modules = [
            ['code'=> 1, 'intitule'=> "Math", "coef"=> "4", "nombreHeures"=> "80"],
            ['code'=> 2, 'intitule'=> "Phy", "coef"=> "4", "nombreHeures"=> "80"],
            ['code'=> 3, 'intitule'=> "Info", "coef"=> "6", "nombreHeures"=> "160"],
            ['code'=> 4, 'intitule'=> "ENG", "coef"=> "2", "nombreHeures"=> "40"],
        ];
        return view('List.module', ['modules'=>$modules]);
    }
    public function controles() {
        $controles = [
            ['numero'=> 1, 'codeModule'=> "12", "date"=> "2024-02-29", "duree"=> "3"],
            ['numero'=> 2, 'codeModule'=> "2", "date"=> "2024-02-29", "duree"=> "3"],
            ['numero'=> 3, 'codeModule'=> "44", "date"=> "2024-02-29", "duree"=> "5"],
            ['numero'=> 4, 'codeModule'=> "16", "date"=> "2024-02-29", "duree"=> "2"],
        ];
        return view('List.controle', ['controles'=>$controles]);
    }
}
