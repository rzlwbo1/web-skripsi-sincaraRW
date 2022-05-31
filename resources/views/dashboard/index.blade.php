@extends('dashboard.layouts.main')

@section('content-admin')
  <div class="body flex-grow-1 px-3">
    <div class="container-lg">
      @php
        date_default_timezone_set("Asia/Jakarta");
        $hour = date('G');
        $greet = '';

        if($hour >= 5 && $hour <= 9) {
          $greet = "selamat pagi";
        } else if($hour >= 10 && $hour <= 3) {
          $greet = "selamat siang";
        } else if($hour >= 4 && $hour <= 18) {
          $greet = "selamat sore";
        } else {
          $greet = "selamat malam";
        }
      @endphp
      <h2>Halo {{ $greet }} selamat datang kembali 👋</h2>
    </div>
  </div>
@endsection