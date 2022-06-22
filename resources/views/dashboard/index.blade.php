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
        } else if($hour >= 10 && $hour <= 13) {
          $greet = "selamat siang";
        } else if($hour >= 14 && $hour <= 18) {
          $greet = "selamat sore";
        } else {
          $greet = "selamat malam";
        }
      @endphp
        <h2>Halo {{ $greet }} selamat datang kembali 👋</h2>


        {{-- widgets --}}

        <div class="row my-4">
          <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-primary shadow">
              <div class="card-body">
                <div class="fs-4 fw-semibold">{{ $sum[0] }}</div>
                <div>Acara</div>
                <small class="text-medium-emphasis-inverse">Tersedia</small>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-warning shadow">
              <div class="card-body">
                <div class="fs-4 fw-semibold">{{ $sum[1] }}</div>
                <div>Informasi</div>
                <small class="text-medium-emphasis-inverse">Tersedia</small>
              </div>
            </div>
          </div>
          <!-- /.col-->
        </div>
        <!-- /.row-->

    </div>
  </div>
@endsection