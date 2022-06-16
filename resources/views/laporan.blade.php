@extends('dashboard.layouts.main')

@section('content-admin')
  <div class="body flex-grow-1 px-3">
    <div class="container">
      <form action="/cetak-laporan" method="post">
        @csrf
        
        <div class="row g-3 justify-content-center"> 
          <h3>Pilih Rentang Tanggal</h3>
          <hr>
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
  </div>
@endsection