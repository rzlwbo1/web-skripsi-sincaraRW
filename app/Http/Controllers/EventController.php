<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\CategoryEvent;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{


  public function index()
  {

    $titleOnPage = '';

    if(request('category_event')) {
      $cat = CategoryEvent::firstWhere('slug', request('category_event'));
      $titleOnPage = " di " . $cat->name;
    }

    if(request('users')) {
      $user = User::firstWhere('username', request('users'));
      $titleOnPage = " di " . $user->name;
    }

    return view('events', [
      "title" => 'Semua acara',
      "titleSub" => 'Semua Acara ' . $titleOnPage,
      "active" => 'acara',
      // pake eager loader
      "events" => Event::latest()->with(['user', 'categoryEvent'])->filter(request(['search_query', 'category_event', 'users']))->paginate(6)->withQueryString(),
    ]);

  }

  // public function show($slug)
  // {
  //   return view('event', [
  //     "title" => "Post acara",
  //     // "event" => Event::where('slug', $slug)->first(),
  //     "event" => Event::find($id),
  //   ]);
  // }


  // Route model binding
  public function show(Event $event)
  {
    return view('event', [
      "title" => "Post acara",
      // "event" => Event::where('slug', $slug)->first(),
      "event" => $event,
      "active" => 'acara'
    ]);

    // return $convertCarbon;
  }

}
