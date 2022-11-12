<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Bid;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SellerController extends Controller
{
    
    public function index()
    {
        //
    }


    public function register()
    {
        if(session()->has('user')){
            redirect()->route('seller.profile');
        }
        return view('seller.registration');
    }

    
    public function registered(Request $request)
    {
        $validate = $request->validate(
            [
                "first_name" => ["required", "regex:/^[a-z ,.'-]+$/i", "min:1", "max:50"],
                "last_name" => ["required", "regex:/^[a-z ,.'-]+$/i", "min:1", "max:50"],
                "dob" => ["required", "date"],
                "email" => ["required", "email"],
                "address" => ["required", "regex:/^[#.0-9a-zA-Z\s,-]+$/i", "min:3", "max:1000"],
                "photo" => ["required", "mimes:jpg, png, jpeg"],
                "phone" => ["required","max:11"],
                "gender" => ["required"],
                "nid" => ["required","mimes:jpeg,jpg,pdf","max:2048"],
                "bin" => ["required","mimes:jpeg,jpg,pdf","max:2048"],
                "account" => ["required","mimes:jpeg,jpg,pdf","max:2048"],
                "photo" => ["required", "mimes:jpeg,jpg,png", "max:2048"],
                "password" => ["required","same:confirmPassword","min:5"],
                "confirmPassword" => ["required","min:5"]
                //"terms" => ["accepted"]

            ],
            [
                "first_name.required" => "*Required",
                "last_name.required" => "*Required",
                "email.required" => "*Required",
                "address" => "*Required",
                "photo.required" => "Please upload your picture",
                "gender.required" => "*Required",
                "nid.required" => "Upload your NID as jpg",
                "password.required" => "*Required",
                "terms.accepted" => "Please accept the terms"
                
            ]
        );

        $seller = new Seller();
        $seller->first_name = $request->first_name;
        $seller->last_name = $request->last_name;
        $seller->email = $request->email;
        $seller->phone = $request->phone;
        $seller->address = $request->address;
        $seller->gender = $request->gender;
        $seller->dob = $request->dob;
        $seller->status = "registered";
        $seller->password = $request->password;
        
        if($request->hasFile('nid')){
            $imageName = time().'_nid_'.$seller->email.'_'.$request->file('nid')->getClientOriginalName();
            $request->nid->move(base_path('public\assets\uploads'), $imageName);
            $seller->nid=$imageName;   
        }

        
        if($request->hasFile('passport')){
            $imageName = time().'_passport_'.$seller->email.'_'.$request->file('passport')->getClientOriginalName(); 
            $request->passport->move(base_path('public\assets\uploads'), $imageName);
            $seller->passport=$imageName;   
        }

        
        if($request->hasFile('bin')){
            $imageName = time().'_bin_'.$seller->email.'_'.$request->file('bin')->getClientOriginalName();
            
            $request->bin->move(base_path('public\assets\uploads'), $imageName);
            $seller->documents=$imageName;   
        }

        if($request->hasFile('account')){
            $imageName = time().'_account_'.$seller->email.'_'.$request->file('account')->getClientOriginalName();
            
            $request->account->move(base_path('public\assets\uploads'), $imageName);
            $seller->account=$imageName;   
        }
        
        if($request->hasFile('photo')){
            $imageName = time().'_profile_'.$seller->email.'_'.$request->file('photo')->getClientOriginalName();
            $request->photo->move(base_path('public\assets\uploads'), $imageName);
            $seller->photo=$imageName;   
        }
        echo "<pre>";
        
        $seller->save();
        
        return Redirect()->route('seller.login');


    }

    public function login()
    {
        if(session()->has('user')){
            return redirect()->route('seller.dashboard');
        }
        return view('seller.login');
    }
    public function loggedin(Request $req)
    {
        if(session()->has('user')){
            return redirect()->route('seller.dashboard');
        }
        $validate = $req->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
            );
    
            $seller = Seller::where('email',$req->email)->where('password',$req->password)->first();
    
            if($seller)
            {
                session()->put('user', $seller->email);
                return redirect()->route('seller.dashboard');
            }
            
            return redirect()->route('seller.login')->withErrors(['msg'=>'Incorrect email/password']);
    }

  
    public function profile()
    {
        $email = session()->get('user');
        $seller = Seller::where('email',$email)->first();
        //echo "<pre>";
        //print_r($seller);
        return view('seller.profile')->with('seller',$seller);
    }
    public function profileUpdate(Request $request)
    {
        $validate = $request->validate(
            [
                "first_name" => ["required", "regex:/^[a-z ,.'-]+$/i", "min:1", "max:50"],
                "last_name" => ["required", "regex:/^[a-z ,.'-]+$/i", "min:1", "max:50"],
                "dob" => ["required", "date"],
                "email" => ["required", "email"],
                "address" => ["required", "regex:/^[#.0-9a-zA-Z\s,-]+$/i", "min:3", "max:1000"],
                "photo" => ["required", "mimes:jpg, png, jpeg"],
                "phone" => ["required","max:11"],
                "gender" => ["required"],
                "nid" => ["required","mimes:jpeg,jpg,pdf","max:2048"],
                "bin" => ["required","mimes:jpeg,jpg,pdf","max:2048"],
                "account" => ["required","mimes:jpeg,jpg,pdf","max:2048"],
                "photo" => ["required", "mimes:jpeg,jpg,png", "max:2048"],
                "password" => ["required","same:confirmPassword","min:5"],
                "confirmPassword" => ["required","min:5"]
                //"terms" => ["accepted"]

            ],
            [
                "first_name.required" => "*Required",
                "last_name.required" => "*Required",
                "email.required" => "*Required",
                "address" => "*Required",
                "photo.required" => "Please upload your picture",
                "gender.required" => "*Required",
                "nid.required" => "Upload your NID as jpg",
                "password.required" => "*Required",
                "terms.accepted" => "Please accept the terms"
                
            ]
        );

        $email = session()->get('user');
        $seller = Seller::where('email',$email)->first();
        $seller->first_name = $request->first_name;
        $seller->last_name = $request->last_name;
        $seller->email = $request->email;
        $seller->phone = $request->phone;
        $seller->address = $request->address;
        $seller->gender = $request->gender;
        $seller->dob = $request->dob;
        $seller->status = "registered";
        $seller->password = $request->password;
        
        if($request->hasFile('nid')){
            $imageName = time().'_nid_'.$seller->email.'_'.$request->file('nid')->getClientOriginalName();
            $request->nid->move(base_path('public\assets\uploads'), $imageName);
            $seller->nid=$imageName;   
        }

        
        if($request->hasFile('passport')){
            $imageName = time().'_passport_'.$seller->email.'_'.$request->file('passport')->getClientOriginalName(); 
            $request->passport->move(base_path('public\assets\uploads'), $imageName);
            $seller->passport=$imageName;   
        }

        
        if($request->hasFile('bin')){
            $imageName = time().'_bin_'.$seller->email.'_'.$request->file('bin')->getClientOriginalName();
            
            $request->bin->move(base_path('public\assets\uploads'), $imageName);
            $seller->documents=$imageName;   
        }

        if($request->hasFile('account')){
            $imageName = time().'_account_'.$seller->email.'_'.$request->file('account')->getClientOriginalName();
            
            $request->account->move(base_path('public\assets\uploads'), $imageName);
            $seller->account=$imageName;   
        }
        
        if($request->hasFile('photo')){
            $imageName = time().'_profile_'.$seller->email.'_'.$request->file('photo')->getClientOriginalName();
            $request->photo->move(base_path('public\assets\uploads'), $imageName);
            $seller->photo=$imageName;   
        }
        echo "<pre>";
        
        $seller->save();
        return view('seller.profile')->with('seller',$seller);
    }

    public function logout()
    {
        session()->flush();
        return Redirect()->route('home');
    }

    public function orders()
    {   
        $email = session()->get('user');
        $seller = Seller::where('email',$email)->first();
        $orders = Bid::where('seller_id',$seller->id)->get();
        //echo "<pre>";
        //print_r($orders);
        return view('seller.orders')->with('orders',$orders);
    }
    public function bid(Request $req){
        $post = Post::where('id',$req->id)->first();
        
        session()->put("bid", $post);
        return redirect()->route('bid.list')->with('bids',$post);
    }
    public function bids(){
        $data[] = session()->get('bid');
        session()->put("bid", $data);
        return redirect()->route('bid.list')->with('bids',$data);
    }

    public function dashboard()
    {
        $email = session()->get('user');
        $seller = Seller::where('email',$email)->first();
        $orders = Bid::where('seller_id',$seller->id)->get();
        $posts = Post::all();
        $total = count($orders);
        $total2 = count($posts);
        return view('seller.dashboard')->with('total',$total)->with('seller',$seller)->with('total2',$total2);
    }

  
    public function edit(Seller $seller)
    {
        //
    }


    public function update(Request $request, Seller $seller)
    {
        //
    }

    public function destroy(Seller $seller)
    {
        //
    }
}
