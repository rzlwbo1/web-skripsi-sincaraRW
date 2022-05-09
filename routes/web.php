<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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



// shortcut kalo emang mau hanya return view aja
// https://laravel.com/docs/8.x/routing#view-routes

Route::view("/tes", 'welcome');

Route::get('/user/{id}', function($id) {
    return 'User '.$id;
});

// ///////

Route::get('/', function () {
    
    // ini pake depedency injection View
    return View::make('home');
});

Route::get("/about", function() {
    return view('about', [
        "nama" => "Rizal Wibowo",
        "email" => "zal@mail.com"
    ]);
});

Route::get("/blog", function() {
    return view('posts');
});
