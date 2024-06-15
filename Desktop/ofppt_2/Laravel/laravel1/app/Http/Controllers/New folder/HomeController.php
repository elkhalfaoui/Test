<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($id = 1){
        $users = [
            1 => ['nom'=>'Ali'],
            2 => ['nom'=>'Hamza'],
            3 => ['nom'=>'Zakaria'],
        ];
        return view('home',[
            'data' => $users[$id]
        ]);
    }
}
