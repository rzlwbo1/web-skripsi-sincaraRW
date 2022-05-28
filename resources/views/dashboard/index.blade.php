@extends('dashboard.layouts.main')

@section('content-admin')
  <div class="body flex-grow-1 px-3">
    <div class="container-lg">
      <h2>Halo {{ auth()->user()->name }} selamat datang kembali 👋</h2>
    </div>
  </div>
@endsection