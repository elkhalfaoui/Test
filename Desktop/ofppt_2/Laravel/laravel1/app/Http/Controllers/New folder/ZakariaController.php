<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZakariaController extends Controller
{
    public function index($n){
        // return view('zakaria');
        return "la page $n";
    }
}
