<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculController extends Controller
{
    //
    public function Somme($a, $b){
        $a = $a === null? 0: $a;
        $b = $b === null? 0: $b;

        // return "$a + $b = ".$a+$b;
        // return view('calcule', ['a'=>$a, 'b'=>$b, 'resultat'=>$a+$b, 'c'=>'+']);
        if(is_numeric($a) && is_numeric($b)) {
            return view('calcule', ['a'=>$a, 'b'=>$b, 'resultat'=>$a+$b, 'c'=>'+']);
        }
        else {
            return'INVALID';
        }
    }
    public function Produit($a, $b){
        $a = $a === null? 0: $a;
        $b = $b === null? 0: $b;
        // return "$a + $b = ".$a*$b;
        // return view('calcule', ['a'=>$a, 'b'=>$b, 'resultat'=>$a*$b, 'c'=>'x']);
        if(is_numeric($a) && is_numeric($b)) {
            return view('calcule', ['a'=>$a, 'b'=>$b, 'resultat'=>$a*$b, 'c'=>'x']);
        }
        else {
            return'<h1>INVALID</h1>';
        }
    }
    public function acceuil(){

        return view('acceuil');
    }
}
