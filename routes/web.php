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





Route::get("/acara", function() {

  $event_posts = [

    [
        "title" => "Gotong Royong",
        "slug" => "gotong-royong",
        "author" => "Ketua RW",
        "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, nisi doloremque nostrum voluptate labore rerum accusantium nobis ea consequatur! Reprehenderit placeat molestiae atque quas consectetur numquam labore nam eum voluptatem assumenda voluptates, veniam sint, deleniti ad totam sapiente delectus? Eius vitae, magnam cumque soluta quia perferendis inventore atque tenetur, porro reprehenderit excepturi pariatur quaerat, repudiandae ullam esse at debitis assumenda dolorem culpa? Est quaerat praesentium mollitia voluptates nulla, eaque in totam doloribus sapiente harum fugiat unde illo, quibusdam facere? Tempora?"
    ],
  
    [
      "title" => "17 agustusan",
      "slug" => "17-agustusan",
      "author" => "Ketua RT",
      "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, nisi doloremque nostrum voluptate labore rerum accusantium nobis ea consequatur! Reprehenderit placeat molestiae atque quas consectetur numquam labore nam eum voluptatem assumenda voluptates, veniam sint, deleniti ad totam sapiente delectus? Eius vitae, magnam cumque soluta quia perferendis inventore atque tenetur, porro reprehenderit excepturi pariatur quaerat, repudiandae ullam esse at debitis assumenda dolorem culpa? Est quaerat praesentium mollitia voluptates nulla, eaque in totam doloribus sapiente harum fugiat unde illo, quibusdam facere? Tempora?"
    ],
  
  ];

  return view('events', [
      "title" => "acara",
      "events" => $event_posts,
  ]);
});


// single acara
Route::get("/acara/{slug}", function($slug) {

  // data dummy
  $event_posts = [

    [
      "title" => "Gotong Royong",
      "slug" => "gotong-royong",
      "author" => "Ketua RW",
      "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, nisi doloremque nostrum voluptate labore rerum accusantium nobis ea consequatur! Reprehenderit placeat molestiae atque quas consectetur numquam labore nam eum voluptatem assumenda voluptates, veniam sint, deleniti ad totam sapiente delectus? Eius vitae, magnam cumque soluta quia perferendis inventore atque tenetur, porro reprehenderit excepturi pariatur quaerat, repudiandae ullam esse at debitis assumenda dolorem culpa? Est quaerat praesentium mollitia voluptates nulla, eaque in totam doloribus sapiente harum fugiat unde illo, quibusdam facere? Tempora?"
    ],
  
    [
      "title" => "17 agustusan",
      "slug" => "17-agustusan",
      "author" => "Ketua RT",
      "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, nisi doloremque nostrum voluptate labore rerum accusantium nobis ea consequatur! Reprehenderit placeat molestiae atque quas consectetur numquam labore nam eum voluptatem assumenda voluptates, veniam sint, deleniti ad totam sapiente delectus? Eius vitae, magnam cumque soluta quia perferendis inventore atque tenetur, porro reprehenderit excepturi pariatur quaerat, repudiandae ullam esse at debitis assumenda dolorem culpa? Est quaerat praesentium mollitia voluptates nulla, eaque in totam doloribus sapiente harum fugiat unde illo, quibusdam facere? Tempora?"
    ],
  
  ];

  foreach ($event_posts as $event) {
    if($event['slug'] === $slug) {

      return view('event', [
        "event" => $event,
        "title" => $slug
      ]);

    }
  }

  // cara rizal

  // // cari index berdasarkan slug
  // $indexSlug = array_search($slug, array_column($event_posts, 'slug'));
  // // stelah itu cari dari array berdasarkan index yg sudah dapat
  // $acara = $event_posts[$indexSlug];

  // return view("event", [
  //   'acara' => $acara,
  // ]);

});
