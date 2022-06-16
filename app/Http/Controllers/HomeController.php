<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Information;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

       $informations = Information::with('user', 'categoryInformation')->latest()->take(3)->get();

       $events = Event::with('user', 'categoryEvent')->latest()->take(3)->get();

        return view('home', [
            "title" => "beranda",
            "active" => 'beranda',
            'informations' => $informations,
            'events' => $events,
        ]);

    }
}
