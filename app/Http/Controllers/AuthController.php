<?php

namespace App\Http\Controllers;

use App\Models\Service;
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{

    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $user = new User();

        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('success', 'Register successfully');
    }

    public function login()
    {

        if ($user = Auth::check() && auth()->user()->is_admin == 1) {
            return redirect()->route('admin.dashboard');
        }
        if ($user = Auth::check() && auth()->user()->is_admin == 0) {
            return redirect()->route('serviceAccess.dashboard');
        }
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
        return view('connexion', compact(['etablissement', 'servicesADM', 'servicesMEDIC', 'servicesMDCRC', 'servicesDAF', 'servicesDAP', 'servicesDIA', 'servicesDOEHRSI', 'servicesDOSAP', 'servicesDPHI', 'servicesDPI', 'servicesDRF', 'servicesDRH', 'servicesDRHDPC', 'servicesDSIH', 'servicesSG', 'servicesPSY']));
    }


    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if (Auth::attempt($credetials)) {
            if (Auth::user()->is_admin == 0) {
                return redirect('/service/dashboard')->with('success', 'Login Success');
            }
            if (Auth::user()->is_admin==1) {
                return redirect('/admin/dashboard')->with('success', 'Login Success');
            }
            
        }

        throw ValidationException::withMessages([
            'email' => trans('auth.failed')
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function profile()
    {
        return view('profile');
    }

    public function profileUpdate(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => [
                'required',
                Rules\Password::min(8)->letters()->mixedCase()->numbers()->symbols(),
            ],
            'phone_number' => [
                'required',
                'regex:/(06|07)[0-9]{8}/'
            ],
            'address' => 'required|min:10|max:65534',
        ])->validate();

        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->update($request->all());

        return redirect()->route('admin.profile')->with('success', 'Profil mis à jour avec succès!');
    }
}
