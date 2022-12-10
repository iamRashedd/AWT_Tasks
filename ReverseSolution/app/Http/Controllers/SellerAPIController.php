<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Bid;
use App\Models\Post;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DateTime;

class SellerAPIController extends Controller
{

    public function APIRegister(Request $request)
    {
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
        $code = Route('/sendmail');
        return $code;

    }

    public function APILogin(Request $request){
    

        $user = Seller::where('email',$request->email)->where('password',$request->password)->first();

        if($user){
            session()->put('user', $user->email);
            $api_token = Str::random(64);
            $token = Token::find($user->id);
            if(!$token){
                $token = new Token();
            }
            $token->id = $user->id;
            $token->token = $api_token;
            $token->created_at = new DateTime();
            $token->save();
            return $token;
        }
        return "No user found";

    }
    public function APILogout(Request $request){

        $token = Token::where('token',$request->token)->first();
        if($token){
            $token->expired_at =new DateTime();
            $token->save();
            return $token;
        }
    }

    public function APIOrders()
    {   
        $email = session()->get('user');
        $seller = Seller::where('email',$email)->first();
        $orders = Bid::where('seller_id',$seller->id)->get();
        //echo "<pre>";
        //print_r($orders);
        return $orders;
    }
    public function APIProfile($id){
        
        $seller = Seller::where('id',$id)->first();

        return $seller;
    }

    
}
