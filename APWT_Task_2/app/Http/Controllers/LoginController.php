<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class users{
    public $name;
    public $email;
    public $dob;
    public $type;
    public $address;
    public $password;
}

class LoginController extends Controller
{
    //
    public $user;

    public function index(){
        return view('hello');
    }
    public function registration(){
        return View('registration');
    }
    public function registered(Request $request){
        $validate = $request->validate(
        [
            'name' => 'required|min:5|string',
            'email' => 'required|string|',
            'dob' => 'required',
            'type' => 'required_with:type,none',
            'address' => 'required|max:50',
            'password' => 'required|same:confirmPassword|min:5',
            'confirmPassword' => 'required|min:5'
        ],
        [
            'password.same' => 'Passwords did not match',
            'type.required_without' =>'Select valid type'
        ]
        );

        $user = new users();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dob = $request->dob;
        $user->type = $request->type;
        $user->address = $request->address;
        $user->password = $request->password;
        
        echo "<pre>";
        print_r($user);

        //return redirect()->route('login')->with('status' , "registered successfully");
        //return redirect()->route('login');
    }
    public function login(){
        return View('login');
    }
    public function logged(Request $request){
        $validate = $request->validate(
        [
            'email' => 'required',
            'password' => 'required'
        ]
        );

        $user = new users();
        $user->email = "admin";
        $user->password = "password";

        if($request->email == $user->email && $request->password == $user->password )
        {
            return redirect()->route('home')->with('status','Logged in successfully');
        }
        else{
            return redirect()->route('login')->withErrors(['msg'=>'Incorrect email/password']);
        }
    }

}
