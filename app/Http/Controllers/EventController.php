<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{


  public function index()
  {

    $titleOnPage = '';

    if(request('category')) {
      $cat = Category::firstWhere('slug', request('category'));
      $titleOnPage = " di " . $cat->name;
    }

    if(request('users')) {
      $user = User::firstWhere('username', request('users'));
      $titleOnPage = " di " . $user->name;
    }

    return view('events', [
      "title" => 'Semua informasi & acara',
      "titleSub" => 'Semua informasi & acara' . $titleOnPage,
      "active" => 'acara',
      // pake eager loader
      "events" => Event::latest()->with(['user', 'category'])->filter(request(['search_query', 'category', 'users']))->paginate(6)->withQueryString(),
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
      "active" => 'acara'
    ]);

    // return $convertCarbon;
  }

  public function add() {
    
    $category = Category::all();
    return view('create', ['category' => $category]);

  }

  public function store(Request $request) {

    $event = Event::create([
      "title" => $request->title,
      "user_id" => $request->user_id,
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


  public function destroy($id) {

    Event::destroy($id);
    return redirect('/acara');

  }

}
