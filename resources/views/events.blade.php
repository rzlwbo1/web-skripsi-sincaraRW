
@extends('layouts.app')

@section('content')

  <a href="/acara/add" class="btn btn-primary mb-3">buat acara baru</a>


  @foreach ($events as $event)
      <a href="/acara/{{ $event->slug }}">
        <h2>{{ $event->title }}</h2>
      </a>
      <h4>{{ $event->author }}</h4>
      <p>{{ $event->excerpt }}</p>
  @endforeach

@endsection
