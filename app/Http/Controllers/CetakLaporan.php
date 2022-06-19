<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\CategoryEvent;
use Illuminate\Support\Facades\DB;

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

    $sum = [];

    $reports = Event::whereBetween('date_at', [$request->start, $request->end])->get();
    $prioSum = Event::select('priority')->where('priority', 1)->get()->count();
    $formalSum = Event::whereBetween('date_at', [$request->start, $request->end])->select('category_event_id')->where('category_event_id', 2)->get()->count();

    $sum = [$prioSum, $formalSum];

    return view('cetak', [
      'active' => 'laporan',
      'title' => "Cetak laporan",
      'reports' => $reports,
      'res' => $request,
      'sum' => $sum,
      // 'prioSum' => $prioSum,
      // 'formalSum' => $formalSum,
    ]);

  }
}
