
@extends('layouts.app')

@section('content')
  <h2>{{ $event->title }}</h2>
  <p>By. <a href="#">{{ $event->user->name }}</a> dalam kategori <a href="/categories/{{ $event->category->slug }}">{{ $event->category->name }}</a></p>
  {{-- <p>{{ $event->body }}</p> --}}

  {!! $event->body !!}

  <br>
  <a href="/acara">ke semua acara</a>
@endsection



