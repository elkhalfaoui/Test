<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonneController extends Controller
{
    //
    public function index(){
        // return "Bienvenue $nom dans notre site";
        return view('personne');
    }
}
