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

    public function about(){
        return view('about');
    }

    public function teams(){
        return view('teams');
    }
}



