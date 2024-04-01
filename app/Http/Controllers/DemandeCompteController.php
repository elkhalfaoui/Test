<?php

namespace App\Http\Controllers;

use App\Mail\DemandeCreationCompte;
use App\Models\DemandeCompte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class DemandeCompteController extends Controller
{
    //
    // public function create()
    // {
    //     $matricule = "";
    //     $employee = Employee::orderBy('created_at', 'DESC')->get();
    //     $typesTemp = Typeabsence::where('category', 'LIKE', 'Temporaire')->get();
    //     $typesPerm = Typeabsence::where('category', 'LIKE', 'Permanente')->get();
    //     return view('absences.create', compact(['employee', 'matricule', 'typesTemp', 'typesPerm']));
    // }

    // public function createSelected($matricule)
    // {
    //     $employee = Employee::orderBy('created_at', 'DESC')->get();
    //     $typesTemp = Typeabsence::where('category', 'LIKE', 'Temporaire')->get();
    //     $typesPerm = Typeabsence::where('category', 'LIKE', 'Permanente')->get();
    //     return view('absences.create', compact(['employee', 'matricule', 'typesTemp', 'typesPerm']));
    // }
    public function store(Request $request)
    {

        Validator::make($request->all(), [
            'nom' => 'required|min:3|max:40',
            'prenom' => 'required|min:3|max:40',
            'email' => 'required|unique:demande_comptes',
            'telephone' => [
                'required',
                'regex:/(06|07)[0-9]{8}/'
            ],
            'ppr' => 'required',
            'etablissement' => 'required',
            'service' => 'required'
        ])->validate();

        $demande = new DemandeCompte();
        $demande->nom = $request['nom'];
        $demande->prenom = $request['prenom'];
        $demande->email = $request['email'];
        $demande->telephone = $request['telephone'];
        $demande->ppr = $request['ppr'];
        $demande->etablissement = $request['etablissement'];
        $demande->service = $request['service'];
        $demande->save();
        Mail::to('ha.kharrazi@chumarrakech.ma')
            ->send(new DemandeCreationCompte($demande));
        return redirect()->route('login')->with('success', 'Demande envoyée avec succès !');
    }

    // public function search(Request $request)
    // {
    //     $search = $request->header('search');
    //     $output = "";
    //     $employee = Employee::where('nom', 'LIKE', '%' . $search . '%')
    //         ->orWhere('prenom', 'LIKE', '%' . $search . '%')
    //         ->orWhere('matricule', 'LIKE', '%' . $search . '%')
    //         ->orWhere('cin', 'LIKE', '%' . $search . '%')
    //         ->orWhere('email', 'LIKE', '%' . $search . '%')
    //         ->get();

    //     foreach ($employee as $employee) {
    //         $output .=
    //             '<tr>
    //             <td class="align-middle">' . $employee->nom . '</td>
    //             <td class="align-middle">' . $employee->prenom . '</td>
    //             <td class="align-middle">' . $employee->matricule . '</td>
    //             <td class="align-middle">' . $employee->cin . '</td>
    //             <td class="align-middle">' . $employee->email . '</td>
    //             <td class="align-middle">' . $employee->adresse . '</td>
    //             <td class="align-middle">
    //                 <div class="btn-group" role="group" aria-label="Basic example">
    //                     <a href="' . route('absences.createSelected', $employee->matricule) . '" type="button"
    //                         class="btn btn-primary">Choisir</a>
    //                 </div>
    //             </td>
    //         </tr>';
    //     }
    //     return response($output);
    // }

    // public function annulerMotif(Request $request, string $id)
    // {
    //     Validator::make($request->all(), [
    //         'motif' => 'required|min:8|max:65534'
    //     ])->validate();
    //     $absence = Absence::findOrFail($id);
    //     $absence->status = 'Annulée';
    //     $absence->motif = $request->motif;
    //     $absence->update();
    //     return redirect()->route('dashboard')->with('success', 'Absence annulée avec succès!');
    // }

    // public function activer(Request $request, string $id)
    // {

    //     $absence = Absence::findOrFail($id);
    //     $absence->status = 'actif';
    //     $absence->motif = null;
    //     $absence->update();
    //     return redirect()->route('dashboard')->with('success', 'Absence activée avec succès!');
    // }

    // public function exportExcel($id)
    // {
    //     return \Maatwebsite\Excel\Facades\Excel::download(new AbsencesExport($id), Employee::findOrFail($id)->matricule . '_absences_' . \Carbon\Carbon::now()->toDateTimeString() . '.xlsx');
    // }


    // public function exportPDF($id)
    // {
    //     $employee = Employee::findOrFail($id);
    //     $absences = $employee->absences()->get();
    //     $pdf = Pdf::loadView('absences.export2', compact(['employee', 'absences']));

    //     return $pdf->download(Employee::findOrFail($id)->matricule . '_absences_' . \Carbon\Carbon::now()->toDateTimeString() . '.pdf');
    // }
}
