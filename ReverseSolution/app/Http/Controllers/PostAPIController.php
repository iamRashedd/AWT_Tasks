<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostAPIController extends Controller
{
    public function APIList()
    {
        return Post::all();
    }
    public function APIDetails($id)
    {
        return Post::find($id);
    }
    public function APIPostBid($id){
        
    }
}
