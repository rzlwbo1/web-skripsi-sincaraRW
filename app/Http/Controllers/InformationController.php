<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index() {

        // pake eager loading
        $informations = Information::with(['user', 'categoryInformation'])
            ->filter(request(['search_query', 'category_info']))->latest()->get();

        return view('informations', [
            'titleSub' => "Semua Informasi",
            'title' => "Informasi",
            'active' => 'informasi',
            'informations' => $informations,
        ]);

    }


    public function show(Information $information) {

        return view('info', [
            "info" => $information,
            'title' => 'Informasi',
            'active' => 'informasi'
        ]);

    }
}
