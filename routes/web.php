<?php

use App\Http\Controllers\AdminCategoryController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CetakLaporan;
use App\Http\Controllers\DashboardEventsController;
use App\Http\Controllers\DashboardInformationsController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\RegisterController;

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

// Route::view("/tes", 'welcome');

Route::get('/user/{id}', function($id) {
    return 'User '.$id;
});

// ///////

Route::get('/', function () {
    
  // ini pake depedency injection View
  return View::make('home', [
      "title" => "beranda",
      "active" => 'beranda',
  ]);
});

Route::get("/about", function() {
  return view('about', [
      "title" => "about",
      "active" => "about",
      "nama" => "Rizal Wibowo",
      "email" => "zal@mail.com"
  ]);
});



Route::get("/acara", [EventController::class, 'index']);

// single acara
// Route::get("/acara/{id}", [EventController::class, 'show']);
Route::get("/acara/{event:slug}", [EventController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);

Route::get('/users/{user:username}', [UserController::class, 'show']);

// Informations
Route::get('/informasi', [InformationController::class, 'index']);
Route::get('/informasi/{information:slug}', [InformationController::class, 'show']);


// LOGIN & REGISTER
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {

  // awalnya pake controller tpi di ganti closures aja
  return view('dashboard.index', ["state" => "Dashboard"]);

})->middleware('auth');


// CRUD DASHBOARD using resources controller
Route::resource("/dashboard/events", DashboardEventsController::class)->middleware('auth');

Route::resource('/dashboard/informations', DashboardInformationsController::class)->middleware('auth');

Route::get('/download/{path}/{url}', [DownloadController::class, 'download']);

// admin controler
// tidak mengizinkan method show jalan, karna ga perllu
// buat middleware admin sendiri dan assign ke routes ini
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');


Route::get("/laporan", [CetakLaporan::class, 'index']);
Route::post("/cetak-laporan", [CetakLaporan::class, 'cetakLaporan']);

