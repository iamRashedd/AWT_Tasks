<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        return view('hello');
    }

    public function profile(){
        return view('profile');
    }
}
