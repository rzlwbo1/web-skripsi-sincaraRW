
{{-- pake layoutnya dlu jgn lupa --}}
@extends('layouts.app')


{{-- isi dri yield nya juga perlu --}}
@section('content')
  <div class="container mt-3">
    <img src="https://picsum.photos/300" alt="image from lorem picsum">
    <h1>Ini Halaman Home {{ $title }}</h1>
  </div>
@endsection
