<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;
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

  public function show($id)
  {
    return view('event', [
      "title" => "Post acara",
      // "event" => Event::where('slug', $slug)->first(),
      "event" => Event::find($id),
    ]);
  }

  public function add() {
    
    return view('create');

  }

  public function store(Request $request) {

    $event = new Event();

    $event->title = $request->title;
    $event->slug = Str::slug($request->title);
    $event->priority = $request->priority;
    $event->excerpt = Str::limit($request->body, 100);
    $event->body = $request->body;
    $event->publish_at = $request->publish_at;
    $event->time_at = $request->time_at;

    $event->save();

  }

}
