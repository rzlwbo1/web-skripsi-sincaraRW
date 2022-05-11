<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

  public function index()
  {
    return view('events', [
      "title" => 'acara',
      "events" => Event::all(),
    ]);
  }

  public function show($slug)
  {
    return view('event', [
      "title" => $slug,
      "event" => Event::where('slug', $slug)->first(),
    ]);
  }

}
