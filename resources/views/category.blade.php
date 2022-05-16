
@extends('layouts.app')

@section('content')
  <h1 class="mb-5">Informasi dan Acara kategori : {{ $category }}</h1>


  @foreach ($events as $event)
    <article>
      <a href="/acara/{{ $event->slug }}">
        <h2>{{ $event->title }}</h2>
      </a>
      
      <p>{{ $event->excerpt }}</p>
    </article>
  @endforeach

@endsection
