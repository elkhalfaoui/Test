<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;

class EcoleController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecoles = Ecole::where('status', 'NOT LIKE', 'inactif')->get();
        // dd($comptes);
        return view('admin.ecoles.index', compact('ecoles'));
    }


    public function create()
    {
        return view('admin.ecoles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email|unique:ecoles,email',
            'nom' => 'required|max:255',
            'sigle' => 'required|max:255',
            'adresse' => 'required|max:3000',
            'telephone' => [
                'required',
                'regex:/(05|06|07)[0-9]{8}/'
            ],
            // 'password' => [
            //     'required',
            //     Rules\Password::min(8)->letters()->mixedCase()->numbers()->symbols(),
            // ],
        ])->validate();

        $ecole = new Ecole();
        $ecole->nom = $request['nom'];
        $ecole->email = $request['email'];
        $ecole->sigle = $request['sigle'];
        $ecole->adresse = $request['adresse'];
        $ecole->telephone = $request['telephone'];
        $ecole->effectif_accueil = $request['effectif_accueil'];
        $ecole->status = 'actif';
        $ecole->save();

        return redirect()->route('admin.ecoles')->with('success', 'Ecole créée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ecole = Ecole::findOrFail($id);

        return view('admin.ecoles.show', compact('ecole'));
    }


    // public function absences(string $id)
    // {
    //     $ecole = Ecole::findOrFail($id);
    //     $stagiaires = Stagiaire::where('etablissement_origine', 'LIKE', $ecole->nom);
    //     $absences = $ecole->absences()->get();
    //     return view('absences.index', compact(['ecole', 'absences']));
    // }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ecole = Ecole::findOrFail($id);
        return view('admin.ecoles.edit', compact('ecole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ecole = Ecole::findOrFail($id);


        Validator::make($request->all(), [
            'email' => 'required|email|unique:ecoles,email',
            'nom' => 'required|max:255',
            'sigle' => 'required|max:255',
            'adresse' => 'required|max:3000',
            'effectif_accueil' => 'required',
            'telephone' => [
                'required',
                'regex:/(05|06|07)[0-9]{8}/'
            ]
        ])->validate();


        $ecole->nom = $request['nom'];
        $ecole->email = $request['email'];
        $ecole->sigle = $request['sigle'];
        $ecole->adresse = $request['adresse'];
        $ecole->telephone = $request['telephone'];
        $ecole->effectif_accueil = $request['effectif_accueil'];

        $ecole->save();

        return redirect()->route('admin.ecoles')->with('success', 'Ecole mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ecole = Ecole::findOrFail($id);

        $ecole->status = 'inactif';

        return redirect()->route('admin.ecole')->with('success', 'Ecole supprimée avec succès!');
    }

    // public function genererMDP(string $id)
    // {
    //     $compte = stagiaire::findOrFail($id);
    //     // dd($comptes);
    //     $newpassword = str::password(8, true, true, false, false);
    //     $compte->password = Hash::make($newpassword);
    //     return redirect()->route('comptes')->with('warning', 'Le nouveau mot de passe est : " ' . $newpassword . ' " . Veuillez fournir ce nouveau mot de passe à l\'utilsateur pour qu\'il puisse le changer !');
    // }


    // public function valider(string $id)
    // {
    //     $demande = DemandeCompte::findOrFail($id);
    //     $stagiaire = new User();
    //     $user->nom = $demande->nom;
    //     $user->prenom = $demande->prenom;
    //     $user->email = $demande->email;
    //     $user->telephone = $demande->telephone;
    //     $user->ppr = $demande->ppr;
    //     $user->service = $demande->service;
    //     $user->etablissement = $demande->etablissement;
    //     $newpassword = str::password(8, true, true, false, false);
    //     $user->password = Hash::make($newpassword);
    //     $user->save();
    //     $demande->status = 'validéé';
    //     $demande->save();
    //     return redirect()->route('comptes.demandes')->with('success', 'La demande a été validée avec succès, un compte vient d\'être créé suite à la validation')
    //         ->with('warning', 'Le mot de passe est : " ' . $newpassword . ' " . Veuillez fournir ce nouveau mot de passe à l\'utilsateur pour qu\'il puisse le changer !');
    // }
    // public function refuser(string $id)
    // {
    //     $demande = DemandeCompte::findOrFail($id);
    //     $demande->status = 'refusée';
    //     $demande->save();
    //     return redirect()->route('comptes.demandes')->with('error', 'La demande a été refusée avec succès');
    // }

    public function search()
    {
        $ecoles = Ecole::where('status', 'LIKE', 'actif')->get();
        if (request()->has('search')) {
            $search = request('search');
            $ecoles = Ecole::where('nom', 'like', '%' . $search . '%')->orWhere('sigle', 'LIKE', '%' . $search . '%')
                ->orWhere('adresse', 'LIKE', '%' . $search . '%')
                ->orWhere('telephone', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->get();
        }
        $totalGroup = count($ecoles);
        $perPage = 10;
        $page = Paginator::resolveCurrentPage('page');

        $ecoles = new LengthAwarePaginator($ecoles->forPage($page, $perPage), $totalGroup, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);
        return view(
            'admin.ecoles.index',
            compact('ecoles')
        );
    }
}
