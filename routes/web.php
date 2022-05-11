<?php


use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

// use App\Models\Acara;

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
  return View::make('home', [
      "title" => "beranda"
  ]);
});

Route::get("/about", function() {
  return view('about', [
      "title" => "about",
      "nama" => "Rizal Wibowo",
      "email" => "zal@mail.com"
  ]);
});



Route::get("/acara", [EventController::class, 'index']);

// single acara
Route::get("/acara/{slug}", [EventController::class, 'show']);
