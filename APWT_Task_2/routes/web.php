<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/hello', function () {
    return view('hello');
});

Route::get('/index',[PagesController::class,'index'])->name("home");
Route::get('/profile',[PagesController::class,'profile'])->name("profile");


Route::get('/',[ProductController::class,'index'])->name("home");
Route::get('/products/service',[ProductController::class,'showProducts'])->name("products");
Route::get('/contact',[ProductController::class,'contact'])->name("contact");
Route::get('/about',[ProductController::class,'about'])->name("about");
Route::get('/teams',[ProductController::class,'teams'])->name("teams");
Route::get('/login',[LoginController::class,'login'])->name("name");
Route::get('/registration',[LoginController::class,'registration'])->name("registration");
Route::post('/registration',[LoginController::class,'registered'])->name("registered");


