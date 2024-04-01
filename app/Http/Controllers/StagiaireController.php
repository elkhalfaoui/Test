<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use App\Models\Service;
use App\Models\Stagiaire;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;

class StagiaireController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stagiaires = Stagiaire::where('status', 'NOT LIKE', 'inactif')->get();
        // dd($comptes);
        if (Auth::user()->is_admin == 1) {
            return view('admin.stagiaires.index', compact('stagiaires'));
        } else {
            return view('serviceAccess.stagiaires.index', compact(('stagiaires')));
        }
    }


    public function create()
    {
        $etablissement = Service::distinct()->get(['etablissement']);
        $servicesADM = Service::where('service', 'LIKE', 'ADM')->get();
        $servicesMEDIC = Service::where('service', 'LIKE', 'MEDIC')->get();
        $servicesMDCRC = Service::where('service', 'LIKE', 'MDCRC')->get();
        $servicesDAF = Service::where('service', 'LIKE', 'DAF')->get();
        $servicesDAP = Service::where('service', 'LIKE', 'DAP')->get();
        $servicesDIA = Service::where('service', 'LIKE', 'DIA')->get();
        $servicesDOEHRSI = Service::where('service', 'LIKE', 'DOEHRSI')->get();
        $servicesDOSAP = Service::where('service', 'LIKE', 'DOSAP')->get();
        $servicesDPHI = Service::where('service', 'LIKE', 'DPHI')->get();
        $servicesDPI = Service::where('service', 'LIKE', 'DPI')->get();
        $servicesDRF = Service::where('service', 'LIKE', 'DRF')->get();
        $servicesDRH = Service::where('service', 'LIKE', 'DRH')->get();
        $servicesDRHDPC = Service::where('service', 'LIKE', 'DRHDPC')->get();
        $servicesDSIH = Service::where('service', 'LIKE', 'DSIH')->get();
        $servicesSG = Service::where('service', 'LIKE', 'SG')->get();
        $servicesPSY = Service::where('service', 'LIKE', 'PSY')->get();
        $ecoles = Ecole::where('status', 'NOT LIKE', 'inactif')->get();
        // dd($ecoles);
        if (Auth::user()->is_admin == 1) {
            return view('admin.stagiaires.create', compact(['etablissement', 'servicesADM', 'servicesMEDIC', 'servicesMDCRC', 'servicesDAF', 'servicesDAP', 'servicesDIA', 'servicesDOEHRSI', 'servicesDOSAP', 'servicesDPHI', 'servicesDPI', 'servicesDRF', 'servicesDRH', 'servicesDRHDPC', 'servicesDSIH', 'servicesSG', 'servicesPSY', 'ecoles']));
        } else {
            return view('serviceAccess.stagiaires.create', compact(['etablissement', 'servicesADM', 'servicesMEDIC', 'servicesMDCRC', 'servicesDAF', 'servicesDAP', 'servicesDIA', 'servicesDOEHRSI', 'servicesDOSAP', 'servicesDPHI', 'servicesDPI', 'servicesDRF', 'servicesDRH', 'servicesDRHDPC', 'servicesDSIH', 'servicesSG', 'servicesPSY', 'ecoles']));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email|unique:stagiaires,email',
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'sujet' => 'required',
            'telephone' => [
                'required',
                'regex:/(06|07)[0-9]{8}/'
            ],
            'etablissement' => 'required',
            'etablissement_origine' => 'required',
            'service' => 'required',
            'niveau_etudes' => 'required',
            'type_stage' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif'

            // 'password' => [
            //     'required',
            //     Rules\Password::min(8)->letters()->mixedCase()->numbers()->symbols(),
            // ],
        ])->validate();

        $stagiaire = new Stagiaire();
        $stagiaire->nom = $request['nom'];
        $stagiaire->email = $request['email'];
        $stagiaire->prenom = $request['prenom'];
        $stagiaire->date_debut = Carbon::createFromFormat('d/m/Y', $request['date_debut'])->format('Y-m-d');
        $stagiaire->date_fin = Carbon::createFromFormat('d/m/Y', $request['date_debut'])->format('Y-m-d');
        $stagiaire->telephone = $request['telephone'];
        $stagiaire->etablissement = $request['etablissement'];
        $stagiaire->etablissement_origine = $request['etablissement_origine'];
        $stagiaire->niveau_etudes = $request['niveau_etudes'];
        $stagiaire->type_stage = $request['type_stage'];
        $stagiaire->service = $request['service'];
        $stagiaire->sujet = $request['sujet'];
        if (request()->has('image')) {
            $filename = $stagiaire->nom . '-' . $stagiaire->prenom . '.' . request()->file('image')->getClientOriginalExtension();
            $imagePath = request()->file('image')->storeAs('profile/stagiaire', $filename, 'public');
            $stagiaire->image = $imagePath;
        }
        $stagiaire->status = 'actif';
        $stagiaire->save();
        if (Auth::user()->is_admin == 1) {
            return redirect()->route('admin.stagiaires')->with('success', 'Stagiaire créé avec succès !');
        } else {
            return redirect()->route('service.stagiaires')->with('success', 'Stagiaire créé ave succès !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stagiaire = Stagiaire::findOrFail($id);

        if (Auth::user()->is_admin == 1) {
            return view('admin.stagiaires.show', compact('stagiaire'));
        } else {
            return view('serviceAccess.stagiaires.show', compact('stagiaire'));
        }
    }


    public function absences(string $id)
    {
        $stagiaire = Stagiaire::findOrFail($id);
        $absences = $stagiaire->absences()->get();
        return view('absences.index', compact(['stagiaire', 'absences']));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stagiaire = Stagiaire::findOrFail($id);
        $etablissement = Service::distinct()->get(['etablissement']);
        $servicesADM = Service::where('service', 'LIKE', 'ADM')->get();
        $servicesMEDIC = Service::where('service', 'LIKE', 'MEDIC')->get();
        $servicesMDCRC = Service::where('service', 'LIKE', 'MDCRC')->get();
        $servicesDAF = Service::where('service', 'LIKE', 'DAF')->get();
        $servicesDAP = Service::where('service', 'LIKE', 'DAP')->get();
        $servicesDIA = Service::where('service', 'LIKE', 'DIA')->get();
        $servicesDOEHRSI = Service::where('service', 'LIKE', 'DOEHRSI')->get();
        $servicesDOSAP = Service::where('service', 'LIKE', 'DOSAP')->get();
        $servicesDPHI = Service::where('service', 'LIKE', 'DPHI')->get();
        $servicesDPI = Service::where('service', 'LIKE', 'DPI')->get();
        $servicesDRF = Service::where('service', 'LIKE', 'DRF')->get();
        $servicesDRH = Service::where('service', 'LIKE', 'DRH')->get();
        $servicesDRHDPC = Service::where('service', 'LIKE', 'DRHDPC')->get();
        $servicesDSIH = Service::where('service', 'LIKE', 'DSIH')->get();
        $servicesSG = Service::where('service', 'LIKE', 'SG')->get();
        $servicesPSY = Service::where('service', 'LIKE', 'PSY')->get();
        $ecoles = Ecole::where('status', 'NOT LIKE', 'inactif')->get();

        if (Auth::user()->is_admin == 1) {
            return view('admin.stagiaires.edit', compact(['stagiaire', 'etablissement', 'servicesADM', 'servicesMEDIC', 'servicesMDCRC', 'servicesDAF', 'servicesDAP', 'servicesDIA', 'servicesDOEHRSI', 'servicesDOSAP', 'servicesDPHI', 'servicesDPI', 'servicesDRF', 'servicesDRH', 'servicesDRHDPC', 'servicesDSIH', 'servicesSG', 'servicesPSY', 'ecoles']));
        } else {
            return view('serviceAccess.stagiaires.edit', compact(['stagiaire', 'etablissement', 'servicesADM', 'servicesMEDIC', 'servicesMDCRC', 'servicesDAF', 'servicesDAP', 'servicesDIA', 'servicesDOEHRSI', 'servicesDOSAP', 'servicesDPHI', 'servicesDPI', 'servicesDRF', 'servicesDRH', 'servicesDRHDPC', 'servicesDSIH', 'servicesSG', 'servicesPSY', 'ecoles']));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stagiaire = Stagiaire::findOrFail($id);


        Validator::make($request->all(), [
            'email' => 'required|email',
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            // 'date_debut' => 'required',
            // 'date_fin' => 'required',
            'telephone' => [
                'required',
                'regex:/(06|07)[0-9]{8}/'
            ],
            'etablissement' => 'required',
            'etablissement_origine' => 'required',
            'service' => 'required',
            'sujet' => 'required',
            'type_stage' => 'required'
            // 'password' => [
            //     'required',
            //     Rules\Password::min(8)->letters()->mixedCase()->numbers()->symbols(),
            // ],
        ])->validate();


        $stagiaire->nom = $request['nom'];
        $stagiaire->email = $request['email'];
        $stagiaire->prenom = $request['prenom'];
        // $stagiaire->date_debut = $request['date_debut'];
        // $stagiaire->date_fin = $request['date_fin'];
        $stagiaire->telephone = $request['telephone'];
        $stagiaire->etablissement = $request['etablissement'];
        $stagiaire->etablissement_origine = $request['etablissement_origine'];
        $stagiaire->type_stage = $request['type_stage'];
        $stagiaire->service = $request['service'];
        $stagiaire->sujet = $request['sujet'];
        /*         dd($validated); */
        if (request()->hasFile('image')) {
            Storage::disk('public')->delete($stagiaire->image);
            $filename = $stagiaire->nom . '-' . $stagiaire->prenom . '.' . request()->file('image')->getClientOriginalExtension();
            $imagePath = request()->file('image')->storeAs('profile/stagiaire', $filename, 'public');
            $stagiaire->image = $imagePath;
        }

        $stagiaire->save();
        if (Auth::user()->is_admin == 1) {
            return redirect()->route('admin.stagiaires')->with('success', 'Stagiaire mis à jour avec succès!');
        } else {
            return redirect()->route('service.stagiaires')->with('success', 'Stagiaire mis à jour avec succès!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stagiaire = Stagiaire::findOrFail($id);

        $stagiaire->delete();

        return redirect()->route('admin.stagiaires')->with('success', 'Stagiaire supprimé avec succès!');
    }

    // public function genererMDP(string $id)
    // {
    //     $compte = stagiaire::findOrFail($id);
    //     // dd($comptes);
    //     $newpassword = str::password(8, true, true, false, false);
    //     $compte->password = Hash::make($newpassword);
    //     return redirect()->route('comptes')->with('warning', 'Le nouveau mot de passe est : " ' . $newpassword . ' " . Veuillez fournir ce nouveau mot de passe à l\'utilsateur pour qu\'il puisse le changer !');
    // }


    public function valider(string $id)
    {
        $stagiaire = Stagiaire::findOrFail($id);
        $stagiaire->status = "validé";
        $stagiaire->save();
        return redirect()->route('admin.stagiaires')->with('success', 'Le stage de ' . $stagiaire->nom . ' ' . $stagiaire->prenom . ' a été validé avec succès !');
    }
    // public function refuser(string $id)
    // {
    //     $demande = DemandeCompte::findOrFail($id);
    //     $demande->status = 'refusée';
    //     $demande->save();
    //     return redirect()->route('comptes.demandes')->with('error', 'La demande a été refusée avec succès');
    // }

    public function search()
    {
        $stagiaires = Stagiaire::where('status', 'LIKE', 'actif')->get();
        if (request()->has('search')) {
            $search = request('search');
            $stagiaires = Stagiaire::where('nom', 'like', '%' . $search . '%')->orWhere('prenom', 'LIKE', '%' . $search . '%')
                ->orWhere('sujet', 'LIKE', '%' . $search . '%')
                ->orWhere('telephone', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('service', 'LIKE', '%' . $search . '%')
                ->orWhere('etablissement', 'LIKE', '%' . $search . '%')
                ->get();
        }
        $totalGroup = count($stagiaires);
        $perPage = 10;
        $page = Paginator::resolveCurrentPage('page');

        $stagiaires = new LengthAwarePaginator($stagiaires->forPage($page, $perPage), $totalGroup, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);
        if (Auth::user()->is_admin == 1) {
            return view(
                'admin.stagiaires.index',
                compact('stagiaires')
            );
        } else {
            return view(
                'serviceAccess.stagiaires.index',
                compact('stagiaires')
            );
        }
    }
}
