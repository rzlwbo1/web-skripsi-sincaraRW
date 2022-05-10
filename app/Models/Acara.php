<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Acara
{
  // use HasFactory;

  private static $event_posts = [

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


  public static function all() {

    // jadiin collection biar mantep
    return collect(self::$event_posts);

  }

  public static function find($slug) {

    // panggil method static di atas
    $events = self::all();
    // $event = [];
    // foreach ($events as $e) {
    //   if($e['slug'] === $slug) {

    //     $event = $e;

    //   }
    // }

    // kode di aats di sederhanakan jadi di bawah

    return $events->where('slug', $slug);
  }

  
}
