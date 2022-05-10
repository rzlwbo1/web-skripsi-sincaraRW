<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;

class AcaraController extends Controller
{

  public function index()
  {
    return view('events', [
      "title" => 'acara',
      "events" => Acara::all(),
    ]);
  }

  public function show($slug)
  {
    return view('event', [
      "title" => $slug,
      "event" => Acara::find($slug),
    ]);
  }

}
