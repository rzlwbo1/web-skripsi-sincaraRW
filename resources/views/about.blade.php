
@extends('layouts.app')

@section('content')
  <h1>Ini halaman about</h1>
  <img src="/img/tes.jpg" width="300" alt="gambar jpg">
  <h3>{{ $nama }}</h3>
  <p>{{ $email }}</p>
@endsection
