<?php

namespace App\Http\Controllers;

use App\Models\CategoryEvent;
use App\Models\Event;
use Illuminate\Http\Request;

class CetakLaporan extends Controller
{

  public function index() {

    return view('laporan', [
      'title' => "Cetak laporan",
      'state' => "Laporan Acara",
      "active" => "laporan",
    ]);

  }

  public function cetakLaporan(Request $request)
  {

    $reports = Event::whereBetween('date_at', [$request->start, $request->end])->get();

    return view('cetak', [
      'active' => 'laporan',
      'title' => "Cetak laporan",
      'reports' => $reports,
      'res' => $request
    ]);

  }
}
