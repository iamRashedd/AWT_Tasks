<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Bid;
use Illuminate\Http\Request;
use App\Mail\TestMail;
use App\Mail\SellerHistoryMail;
use App\Mail\RegistrationMail;
use Mail;

class SellerEmailController extends Controller
{
    public function sendMail(){
        $mail = session()->get('user');
        $code = int::random(4);
        $details = [
            'title' => 'Confirmation Mail',
            'url' => 'https://www.mail.google.com',
            'code' => $code

        ];
        
        //return $details;
        Mail::to($mail)->send(new TestMail($details));

        return $code;

        
    }
    public function sendConfirmation(){
        $mail = session()->get('user');

    }
    public function historyMail(){
        $email = session()->get('user');
        $seller = Seller::where('email',$email)->first();
        $orders = Bid::where('seller_id',$seller->id)->get();
        //echo "<pre>";
        //print_r($orders);
        return view('seller.orders')->with('orders',$orders);
        
        //return $details;
        Mail::to($email)->send(new SellerHistoryMail($orders));

        return view('seller.orders')->with('orders',$orders);

        
    }
}
