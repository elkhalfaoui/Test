<?php

use App\Http\Controllers\ArticlesController;
use App\Models\Filiere;
use App\Models\Stagiaire;
use App\Models\Telephone;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $filieres = Filiere::all();
    
    return view('filiere', compact('filieres'));
});
Route::get('/filiere/{id}', function ($id) {

    $filiere = Filiere::find($id);

    // $modules = $filiere->modules;
    return view('modules', compact('filiere'));
    
})->name('filiere');

Route::post('/articles/filter', [ArticlesController::class, 'filter'])->name('articles.filter');
Route::resource('/articles', ArticlesController::class);

Route::fallback(function () {
    return '404 not found!';
});


Route::any( '/page{n?}', function($n= null){
    echo $n;
})->name('name');




Route::middleware('monGroup')->prefix('group')->group(function() {
    Route::get('/bienvenue/{nom?}', function ($nom = null) {
        return '<h1>Bienvenue ' . $nom . '<h1>';
    });
    Route::get('/acceuil/{nom?}', function ($nom = null) {
        return '<h1>Bienvenue ' . $nom . '<h1>';
    });
});