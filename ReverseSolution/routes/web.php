<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\SellerEmailController;


Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sellerregistration', [SellerController::class, 'register'])->name('seller.registration');
Route::post('/sellerregistration', [SellerController::class, 'registered'])->name('seller.registration');
Route::get('/sellerlogin', [SellerController::class, 'login'])->name('seller.login');
Route::post('/sellerlogin', [SellerController::class, 'loggedin'])->name('seller.login');
Route::get('/sellerlogout', [SellerController::class, 'logout'])->middleware('LoggedInSeller')->name('seller.logout');
Route::get('/sellerprofile', [SellerController::class, 'profile'])->middleware('LoggedInSeller')->name('seller.profile');
Route::post('/sellerupdate', [SellerController::class, 'profileUpdate'])->middleware('LoggedInSeller')->name('seller.profileUpdate');
Route::get('/sellerdashboard', [SellerController::class, 'dashboard'])->middleware('LoggedInSeller')->name('seller.dashboard');
Route::get('/sellerorders', [SellerController::class, 'orders'])->middleware('LoggedInSeller')->name('seller.orders');
Route::get('/sellerbid/{id}', [SellerController::class, 'bid'])->middleware('LoggedInSeller')->name('seller.bid');
Route::get('/sellerbids', [SellerController::class, 'bids'])->middleware('LoggedInSeller')->name('seller.bids');

Route::get('/bidlist', [BidController::class, 'list'])->middleware('LoggedInSeller')->name('bid.list');
Route::get('/sellerbiddetails/{id}', [BidController::class, 'biddetails'])->middleware('LoggedInSeller')->name('bid.details');

Route::get('/postdetails/{id}', [PostController::class, 'postdetails'])->middleware('LoggedInSeller')->name('post.details');
Route::get('/postlist', [PostController::class, 'list'])->middleware('LoggedInSeller')->name('posts.list');
Route::get('/showsellers', [AdminController::class, 'showSellers']);

Route::get('/sendmail', [SellerEmailController::class, 'sendMail']);
Route::get('/historymail', [SellerEmailController::class, 'historyMail'])->middleware('LoggedInSeller')->name('email.orderhistory');
