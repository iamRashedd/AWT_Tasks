<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerAPIController;
use App\Http\Controllers\PostAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sellerlogin', [SellerAPIController::class, 'APILogin']);
Route::post('/sellerlogout', [SellerAPIController::class, 'APILogout']);
Route::post('/sellerregister', [SellerAPIController::class, 'APIRegister']);
Route::get('/sellerorders', [SellerAPIController::class, 'APIOrders']);
Route::get('/sellerorderdetails/{id}', [SellerAPIController::class, 'APIOrderDetails']);
Route::get('/sellerprofile/{id}', [SellerAPIController::class, 'APIProfile'])
;
Route::get('/sendmail', [SellerEmailController::class, 'showMail']);
Route::get('/orderhistoryinvoice', [SellerEmailController::class, 'historyMail']);

Route::get('/postlist', [PostAPIController::class, 'apilist']);
Route::get('/postdetails/{id}', [PostAPIController::class, 'apidetails']);

