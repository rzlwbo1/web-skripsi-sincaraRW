
@extends('layouts.app')

@section('content')
  <h3 class="mb-5">Informasi dan Acara yang dibuat oleh : {{ $user }}</h3>


  @foreach ($events as $event)
    <article>
      <a href="/acara/{{ $event->slug }}">
        <h2>{{ $event->title }}</h2>
      </a>
      
      <p>{{ $event->excerpt }}</p>
    </article>
  @endforeach

@endsection
