<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class product{
    public $name;
    public $type;
    public $price;

    function __construct($name,$type,$price){
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
    }
}

class comment{
    public $name;
    public $email;
    public $message;

    function __construct($name,$email,$message){
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }
}

class ProductController extends Controller
{
    //
    public function index(){
        return view('home');
    }

    public function showProducts(){

        $a = new product("Apple", "Fruits", 500);
        $b = new product("Bread", "Food", 50);
        $c = new product("Laptop", "Electric", 1000);

        $products = array($a,$b,$c);
        return view('products')
        ->with("products",$products);
    }

    public function contact(){
        return view('contact');
    }
    public function contacted(Request $request){
        $validate = $request->validate(
            [
                'name' => 'required|min:5|string',
                'email' => 'required|string|',
                'message' => 'required|max:100'
            ]
            );
    
            $comment = new comment($request->name,$request->email,$request->message);
            
            
            echo "<pre>";
            print_r($comment);
    }

    public function about(){
        return view('about');
    }

    public function teams(){
        return view('teams');
    }
}



