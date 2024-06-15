<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Module;
use App\Models\Stagiaire;
use App\Models\Telephone;
use Illuminate\Http\Request;

class ArticleConroller extends Controller
{
   public function index() {

    // $stagiaire = Stagiaire::find(1);
    // echo $stagiaire;

    $filieres = Filiere::all();
    // echo $filiere->stagiaires;
    // $tele = Telephone::find(1);
    // echo $filieres;
    return view('relations.index', compact('filieres'));
   }

   public function filieres(Request $request) {
      $filiere = Filiere::find($request->id);
      // echo $filiere . '<br>';
      $stagiaires = $filiere->stagiaires;
      // echo $stagiaires . '<br>';
      $modules = $filiere->modules;
      // echo $modules . '<br>';
      return view('relations.filieres', compact('filiere', 'modules', 'stagiaires'));
   }

   public function form() {
      return view('relations.form');
   }
   public function validation(Request $request) {

      $request->validate([
         'nom'=>'required',
         'email' => 'required|email',
         'sujet' => 'required',
         'message' => 'required|min:10'
      ]);
   }


   public function create_article () {
      return view('relations.create_article');
   }
   public function create_article_store (Request $request) {
      $request->validate([
         'titre'=>'required|alpha',
         'contenu' => 'required|min:20',
         'image' => 'image|mimes:jpeg,png,jpg,gif',
      ]);
      echo 'nice';
   }

   
   public function exercice3() {
      return view('relations.exercice3');
   }
   public function exercice3_store(Request $request) {

      $request->validate([
         'first_name'=>'required',
         'last_name'=>'required',
         'email'=>'required|email',
         'mobile'=>'required',
         'password' => 'required|confirm:confirm',
         'confirm' => 'required|same:password',
         'about' => 'required'
      ]);
   }

}
