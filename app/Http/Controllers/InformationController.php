<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index() {

        $informations = Information::latest()->get();
        return view('informations', [
            'titleSub' => "Semua Informasi",
            'title' => "Informasi",
            'active' => 'informasi',
            'informations' => $informations,
        ]);

    }


    public function show(Information $information) {

        return $information;

    }
}
