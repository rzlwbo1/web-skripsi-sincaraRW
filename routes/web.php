<?php

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

Route::get('/', function () {
    return "Halaman Home";
});

// shortcut kalo emang mau hanya return view aja
// https://laravel.com/docs/8.x/routing#view-routes

Route::view("/tes", 'welcome');

Route::get('/user/{id}', function($id) {
    return 'User '.$id;
});



Route::get("/about", function() {
    return "Halaman about";
});

Route::get("/blog", function() {
    return "Halaman Blog";
});
