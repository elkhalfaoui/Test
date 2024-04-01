<?php

namespace App\Http\Controllers;

use App\Models\Capacite;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CapaciteController extends Controller
{

    public function index()
    {
        $capacites = Capacite::Where('etablissement', 'LIKE', Auth()->user()->etablissement)->where('service', 'LIKE', Auth()->user()->service)->get();

        if (Auth::user()->is_admin == 1) {
            $capacites = Capacite::all();
            return view('admin.capacite.index', compact(('capacites')));
        } else {
            return view('serviceAccess.capacite.index', compact(('capacites')));
        }
    }

    public function create()
    {
        $etablissement = Auth::user()->etablissement;
        $service = Auth::user()->service;
        if (Auth::user()->is_admin == 1) {
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
            return view('admin.capacite.create', compact((['etablissement', 'servicesADM', 'servicesMEDIC', 'servicesMDCRC', 'servicesDAF', 'servicesDAP', 'servicesDIA', 'servicesDOEHRSI', 'servicesDOSAP', 'servicesDPHI', 'servicesDPI', 'servicesDRF', 'servicesDRH', 'servicesDRHDPC', 'servicesDSIH', 'servicesSG', 'servicesPSY'])));
        } else {
            return view('serviceAccess.capacite.create', compact(['etablissement', 'service']));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'etablissement' => 'required',
            'service' => 'required',
            'filiere' => 'required',
            'niveau_etudes' => 'required',
            'capaciteP1' => 'required',
            'capaciteP2' => 'required',
            'capaciteP3' => 'required'
        ])->validate();

        $capacite = new Capacite();
        $capacite->etablissement = $request['etablissement'];
        $capacite->service = $request['service'];
        $capacite->filiere = $request['filiere'];
        $capacite->niveau_etudes = $request['niveau_etudes'];
        $capacite->capaciteP1 = $request['capaciteP1'];
        $capacite->capaciteP2 = $request['capaciteP2'];
        $capacite->capaciteP3 = $request['capaciteP3'];
        $capacite->save();
        if (Auth::user()->is_admin == 1) {
            return redirect()->route('admin.capacite')->with('success', 'Capacité renseignée avec succès !');
        } else {
            return redirect()->route('service.capacite')->with('success', 'Capacité renseignée avec succès !');
        }
    }


    //

    public function show(string $id)
    {
        $capacite = Capacite::findOrFail($id);

        if (Auth::user()->is_admin == 1) {
            return view('admin.capacite.show', compact('capacite'));
        } else {
            return view('serviceAccess.capacite.show', compact('capacite'));
        }
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $capacite = Capacite::findOrFail($id);
        if (Auth::user()->is_admin == 1) {
            return view('admin.capacite.edit', compact('capacite'));
        } else {
            return view('serviceAccess.capacite.edit', compact('capacite'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $capacite = Capacite::findOrFail($id);


        Validator::make($request->all(), [
            'etablissement' => 'required',
            'service' => 'required',
            'filiere' => 'required',
            'niveau_etudes' => 'required',
            'capaciteP1' => 'required',
            'capaciteP2' => 'required',
            'capaciteP3' => 'required'
        ])->validate();


        $capacite->etablissement = $request['etablissement'];
        $capacite->service = $request['service'];
        $capacite->filiere = $request['filiere'];
        $capacite->niveau_etudes = $request['niveau_etudes'];
        $capacite->capaciteP1 = $request['capaciteP1'];
        $capacite->capaciteP2 = $request['capaciteP2'];
        $capacite->capaciteP3 = $request['capaciteP3'];

        $capacite->save();
        if (Auth::user()->is_admin == 1) {
            return redirect()->route('admin.capacite')->with('success', 'Capacité mise à jour avec succès!');
        } else {
            return redirect()->route('service.capacite')->with('success', 'Capacité mise à jour avec succès!');
        }
    }

    public function search()
    {
        $capacites = Capacite::where('etablissement', 'like', Auth()->user()->etablissement)->Where('service', 'LIKE', Auth()->user()->service)->get();
        if (request()->has('search')) {
            $search = request('search');
            $capacites = Capacite::where('etablissement', 'like', Auth()->user()->etablissement)->Where('service', 'LIKE', Auth()->user()->service)
                ->Where(function ($queryBuilder) {
                    $queryBuilder->Where('filiere', 'LIKE', '%' . request('search') . '%')
                        ->orWhere('niveau_etudes', 'LIKE', '%' . request('search') . '%')
                        ->orWhere('capaciteP1', 'LIKE', '%' . request('search') . '%')
                        ->orWhere('capaciteP2', 'LIKE', '%' . request('search') . '%')
                        ->orWhere('capaciteP3', 'LIKE', '%' . request('search') . '%');
                });
            $capacites = $capacites->get();
        }
        $totalGroup = count($capacites);
        $perPage = 10;
        $page = Paginator::resolveCurrentPage('page');

        $capacites = new LengthAwarePaginator($capacites->forPage($page, $perPage), $totalGroup, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

        if (Auth::user()->is_admin == 1) {
            return view(
                'admin.capacite.index',
                compact('capacites')
            );
        } else {
            return view(
                'serviceAccess.capacite.index',
                compact('capacites')
            );
        }
    }
}
