
@extends('layouts.app')

@section('content')
  <h2>{{ $event->title }}</h2>
  <h4>{{ $event->author }}</h4>
  {{-- <p>{{ $event->body }}</p> --}}

  {!! $event->body !!}

  <br>
  <a href="/acara">ke semua acara</a>
@endsection



