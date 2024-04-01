<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\DemandeCompteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CapaciteController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\StagiaireController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('connexion');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function () {
    /* Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register'); */
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
    // Route::get('/demande', [AuthController::class, 'demande'])->name('demande');
    Route::post('/demande', [DemandeCompteController::class, 'store'])->name('demandeCompte.store');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});
Route::group(['middleware' => 'IsAdmin', 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::controller(CapaciteController::class)->prefix('capacite')->group(function () {
        Route::get('', [CapaciteController::class, 'index'])->name('admin.capacite');
        Route::get('/create', 'create')->name('admin.capacite.create');
        Route::post('/store', 'store')->name('admin.capacite.store');
        Route::get('show/{id}', 'show')->name('admin.capacite.show');
        Route::get('edit/{id}', 'edit')->name('admin.capacite.edit');
        Route::put('edit/{id}', 'update')->name('admin.capacite.update');
        Route::get('/rechercher',  'search')->name('admin.capacite.search');
    });
    Route::controller(CompteController::class)->prefix('comptes')->middleware('auth')->group(function () {
        Route::get('', 'index')->name('admin.comptes');
        Route::get('create', 'create')->name('admin.comptes.create');
        Route::post('store', 'store')->name('admin.comptes.store');
        Route::get('show/{id}', 'show')->name('admin.comptes.show');
        Route::get('/employee/{id}/absences', 'absences')->name('admin.comptes.absences');
        Route::get('edit/{id}', 'edit')->name('admin.comptes.edit');
        Route::put('edit/{id}', 'update')->name('admin.comptes.update');
        Route::delete('destroy/{id}', 'destroy')->name('admin.comptes.destroy');
        Route::get('/genererMDP/{id}', 'genererMDP')->name('admin.genererMDP');
        Route::get('/demandes', 'demandes')->name('admin.comptes.demandes');
        Route::get('/demandes/show/{id}', 'showdemande')->name('admin.comptes.demandes.show');
        Route::get('/demandes/valider/{id}', 'valider')->name('admin.comptes.demandes.valider');
        Route::get('/demandes/refuser/{id}', 'refuser')->name('admin.comptes.demandes.refuser');
        Route::get('/rechercher',  'search')->name('admin.search');
    });
    Route::controller(EcoleController::class)->prefix('ecoles')->middleware('auth')->group(function () {
        Route::get('', 'index')->name('admin.ecoles');
        Route::get('create', 'create')->name('admin.ecoles.create');
        Route::post('store', 'store')->name('admin.ecoles.store');
        Route::get('show/{id}', 'show')->name('admin.ecoles.show');
        // Route::get('/ecole/{id}/absences', 'absences')->name('ecoles.absences');
        Route::get('edit/{id}', 'edit')->name('admin.ecoles.edit');
        Route::put('edit/{id}', 'update')->name('admin.ecoles.update');
        Route::delete('destroy/{id}', 'destroy')->name('admin.ecoles.destroy');
        // Route::get('/genererMDP/{id}', 'genererMDP')->name('genererMDP');
        // Route::get('/rechercher',  'search')->name('search');

    });
    Route::controller(StagiaireController::class)->prefix('stagiaires')->middleware('auth')->group(function () {
        Route::get('', 'index')->name('admin.stagiaires');
        Route::get('create', 'create')->name('admin.stagiaires.create');
        Route::post('store', 'store')->name('admin.stagiaires.store');
        Route::get('show/{id}', 'show')->name('admin.stagiaires.show');
        Route::get('/stagiaire/{id}/absences', 'absences')->name('admin.stagiaires.absences');
        Route::get('edit/{id}', 'edit')->name('admin.stagiaires.edit');
        Route::put('edit/{id}', 'update')->name('admin.stagiaires.update');
        Route::get('/stagiaires/valider/{id}', 'valider')->name('admin.stagiaires.valider');
        Route::delete('destroy/{id}', 'destroy')->name('admin.stagiaires.destroy');
        Route::get('/rechercher',  'search')->name('admin.search');
    });
});


Route::group(['middleware' => 'auth', 'prefix' => 'service'], function () {
    Route::get('/dashboard', [HomeController::class, 'serviceIndex'])->name('service.dashboard');
    Route::controller(CapaciteController::class)->prefix('capacite')->group(function () {
        Route::get('', [CapaciteController::class, 'index'])->name('service.capacite');
        Route::get('/create', 'create')->name('service.capacite.create');
        Route::post('/store', 'store')->name('service.capacite.store');
        Route::get('show/{id}', 'show')->name('service.capacite.show');
        Route::get('edit/{id}', 'edit')->name('service.capacite.edit');
        Route::put('edit/{id}', 'update')->name('service.capacite.update');
        Route::get('/rechercher',  'search')->name('service.capacite.search');
    });
    Route::controller(StagiaireController::class)->prefix('stagiaires')->group(function () {
        Route::get('', 'index')->name('service.stagiaires');
        Route::get('create', 'create')->name('service.stagiaires.create');
        Route::post('store', 'store')->name('service.stagiaires.store');
        Route::get('show/{id}', 'show')->name('service.stagiaires.show');
        Route::get('/stagiaire/{id}/absences', 'absences')->name('service.stagiaires.absences');
        Route::get('edit/{id}', 'edit')->name('service.stagiaires.edit');
        Route::put('edit/{id}', 'update')->name('service.stagiaires.update');
        Route::get('/rechercher',  'search')->name('service.search');
    });
});
