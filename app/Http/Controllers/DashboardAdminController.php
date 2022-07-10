<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Information;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index() {

        $sumAcara = Event::where('user_id', 6)->get()->count();
        $sumInfos = Information::where('user_id', 6)->get()->count();

        $sum = collect([$sumAcara, $sumInfos]);

        return view('dashboard.index', [
            'state' => 'dashboard',
            'sum' => $sum
        ]);

    }
}
