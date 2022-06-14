@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="/cetak-laporan" method="post">
      @csrf
      
      <div class="row g-3 justify-content-center">
        <div class="col-sm-4">
          <label for="" class="form-label">Tanggal awal</label>
          <input type="date" class="form-control" name="start">
        </div>
        <div class="col-sm-4">
          <label for="" class="form-label">Tanggal akhir</label>
          <input type="date" class="form-control" name="end">
        </div>
      </div>
      
      <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary">Cetak laporan</button>
      </div>
    
    </form>
  </div>
@endsection