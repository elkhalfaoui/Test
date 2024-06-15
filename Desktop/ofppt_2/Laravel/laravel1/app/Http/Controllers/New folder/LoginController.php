<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function loginPage () {
        echo Auth::user();
        return view('login');
    }

    public function loginPost (Request $request) {
        // dd($request);
        $credentials = [
        'email' => $request->email,
        'password' => $request->password,
       ];
        // $credentials = $request->only('email', 'password');
    //    var_dump(Auth::attempt($credentials));
       if(Auth::attempt($credentials)){
        echo Auth::user();
        return redirect('/acceuil');
       } else {
        
       }
    
    }

    public function acceuil () {
        echo(Auth::user());
        return view('acceuil');
    }
    public function logout (Request $request) {
        // echo Auth::user();;
        // echo 'test';
        Auth::logout();
        return redirect('/login');
    }

    
}
