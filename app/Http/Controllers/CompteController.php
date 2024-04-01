<?php

namespace App\Http\Controllers;

use App\Models\DemandeCompte;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CompteController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comptes = User::where('is_admin', '=', '0')->get();
        // dd($comptes);
        return view('admin.comptes.index', compact('comptes'));
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
        return view('admin.comptes.create', compact(['etablissement', 'servicesADM', 'servicesMEDIC', 'servicesMDCRC', 'servicesDAF', 'servicesDAP', 'servicesDIA', 'servicesDOEHRSI', 'servicesDOSAP', 'servicesDPHI', 'servicesDPI', 'servicesDRF', 'servicesDRH', 'servicesDRHDPC', 'servicesDSIH', 'servicesSG', 'servicesPSY']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'ppr' => 'required|unique:users',
            'telephone' => [
                'required',
                'regex:/(06|07)[0-9]{8}/'
            ],
            'etablissement' => 'required',
            'service' => 'required',
            // 'password' => [
            //     'required',
            //     Rules\Password::min(8)->letters()->mixedCase()->numbers()->symbols(),
            // ],
        ])->validate();

        $user = new User();
        $user->nom = $request['nom'];
        $user->email = $request['email'];
        $user->prenom = $request['prenom'];
        $user->ppr = $request['ppr'];
        $user->telephone = $request['telephone'];
        $user->etablissement = $request['etablissement'];
        $user->service = $request['service'];
        $newpassword = str::password(8, true, true, false, false);
        $user->password = Hash::make($newpassword);
        if (request()->has('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $request['image'] = $imagePath;
        }
        $user->image = $request['image'];
        $user->save();

        return redirect()->route('admin.comptes')->with('success', 'Compte créé avec succès, Le mot de passe est : " ' . $newpassword . ' " . Veuillez fournir ce mot de passe à l\'utilsateur pour qu\'il puisse le changer !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $compte = User::findOrFail($id);

        return view('admin.comptes.show', compact('compte'));
    }


    public function absences(string $id)
    {
        $employee = Employee::findOrFail($id);
        $absences = $employee->absences()->get();
        return view('absences.index', compact(['employee', 'absences']));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $compte = User::findOrFail($id);
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
        return view('admin.comptes.edit', compact(['compte', 'etablissement', 'servicesADM', 'servicesMEDIC', 'servicesMDCRC', 'servicesDAF', 'servicesDAP', 'servicesDIA', 'servicesDOEHRSI', 'servicesDOSAP', 'servicesDPHI', 'servicesDPI', 'servicesDRF', 'servicesDRH', 'servicesDRHDPC', 'servicesDSIH', 'servicesSG', 'servicesPSY']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);


        Validator::make($request->all(), [
            'email' => 'required|email',
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'ppr' => 'required',
            'telephone' => [
                'required',
                'regex:/(06|07)[0-9]{8}/'
            ],
            'etablissement' => 'required',
            'service' => 'required',
            // 'password' => [
            //     'required',
            //     Rules\Password::min(8)->letters()->mixedCase()->numbers()->symbols(),
            // ],
        ])->validate();


        $user->nom = $request['nom'];
        $user->email = $request['email'];
        $user->prenom = $request['prenom'];
        $user->ppr = $request['ppr'];
        $user->telephone = $request['telephone'];
        $user->etablissement = $request['etablissement'];
        $user->service = $request['service'];
        $user->password = $request['password'];

        /*         dd($validated); */
        if (request()->hasFile('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $user->image = $imagePath;

            Storage::disk('public')->delete($user->image);
        }

        $user->save();

        return redirect()->route('admin.comptes')->with('success', 'Compte mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.comptes')->with('success', 'Compte supprimé avec succès!');
    }

    public function genererMDP(string $id)
    {
        $compte = User::findOrFail($id);
        // dd($comptes);
        $newpassword = str::password(8, true, true, false, false);
        $compte->password = Hash::make($newpassword);
        // dd($newpassword,$compte);
        $compte->save();
        return redirect()->route('admin.comptes')->with('warning', 'Le nouveau mot de passe est : " ' . $newpassword . ' " . Veuillez fournir ce nouveau mot de passe à l\'utilsateur pour qu\'il puisse le changer !');
    }

    public function demandes()
    {
        $demandes = DemandeCompte::where('status', '=', '')->get();
        return view('admin.demandes.index', compact('demandes'));
    }

    public function showdemande(string $id)
    {
        $demande = DemandeCompte::findOrFail($id);

        return view('admin.demandes.show', compact('demande'));
    }

    public function valider(string $id)
    {
        $demande = DemandeCompte::findOrFail($id);
        $user = new User();
        $user->nom = $demande->nom;
        $user->prenom = $demande->prenom;
        $user->email = $demande->email;
        $user->telephone = $demande->telephone;
        $user->ppr = $demande->ppr;
        $user->service = $demande->service;
        $user->etablissement = $demande->etablissement;
        $newpassword = str::password(8, true, true, false, false);
        $user->password = Hash::make($newpassword);
        $user->save();
        $demande->status = 'validéé';
        $demande->save();
        return redirect()->route('admin.comptes.demandes')->with('success', 'La demande a été validée avec succès, un compte vient d\'être créé suite à la validation')
            ->with('warning', 'Le mot de passe est : " ' . $newpassword . ' " . Veuillez fournir ce nouveau mot de passe à l\'utilsateur pour qu\'il puisse le changer !');
    }
    public function refuser(string $id)
    {
        $demande = DemandeCompte::findOrFail($id);
        $demande->status = 'refusée';
        $demande->save();
        return redirect()->route('admin.comptes.demandes')->with('error', 'La demande a été refusée avec succès');
    }

    public function search()
    {
        $comptes = User::where('is_admin', '=', '0')->get();
        if (request()->has('search')) {
            $search = request('search');
            $comptes = User::where('nom', 'like', '%' . $search . '%')->orWhere('prenom', 'LIKE', '%' . $search . '%')
                ->orWhere('ppr', 'LIKE', '%' . $search . '%')
                ->orWhere('telephone', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('service', 'LIKE', '%' . $search . '%')
                ->orWhere('etablissement', 'LIKE', '%' . $search . '%')
                ->get();
        }
        $totalGroup = count($comptes);
        $perPage = 10;
        $page = Paginator::resolveCurrentPage('page');

        $comptes = new LengthAwarePaginator($comptes->forPage($page, $perPage), $totalGroup, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);
        return view(
            'admin.comptes.index',
            compact('comptes')
        );
    }
}
