<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function registration(){
        return view('registration');
    }
    public function registered(){


        
        return redirect()->route('login');
    }
    public function login(){
        return view('login');
    }
    //
}
