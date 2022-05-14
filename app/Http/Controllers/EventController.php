<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
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

  // public function show($id)
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
    ]);
  }

  public function add() {
    
    return view('create');

  }

  public function store(Request $request) {

    $event = Event::create([
      "title" => $request->title,
      "category_id" => $request->category_id,
      "slug" =>  Str::slug($request->title, "-"),
      "priority" =>$request->priority,
      "excerpt" => Str::limit($request->body, 100),
      "body" => $request->body,
      "publish_at" => $request->publish_at,
      "time_at" => $request->time_at
    ]);

    return redirect('/acara');

    // $event = new Event();

    // $event->title = $request->title;
    // $event->slug = Str::slug($request->title, "-");
    // $event->priority = $request->priority;
    // $event->excerpt = Str::limit($request->body, 100);
    // $event->body = $request->body;
    // $event->publish_at = $request->publish_at;
    // $event->time_at = $request->time_at;

    // $event->save();

  }

  public function edit($id) {

    $event = Event::find($id);
    $category = Category::all();
    return view("edit", [
      "event" => $event,
      "category" => $category,
    ]);

  }


  public function update(Request $request, $id) {

    $event = Event::find($id);

    $event->title = $request->title;
    $event->category_id = $request->category_id;
    $event->slug = Str::slug($request->title, '-');
    $event->priority = $request->priority;
    $event->excerpt = Str::limit($request->body, 100);
    $event->body = $request->body;
    $event->publish_at = $request->publish_at;
    $event->time_at = $request->time_at;

    $event->save();

    return redirect('/acara');

  }

}
