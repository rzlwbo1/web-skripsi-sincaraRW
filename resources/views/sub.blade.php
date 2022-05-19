
@extends('layouts.app')

@section('content')
  <h1 class="mb-5">Informasi dan acara berdasarkan : {{ $titleSub }}</h1>


  @foreach ($events as $event)
    <article>
      <a href="/acara/{{ $event->slug }}">
        <h2>{{ $event->title }}</h2>
      </a>

      <p>By. <a href="/users/{{ $event->user->username }}">{{ $event->user->name }}</a> dalam kategori <a href="/categories/{{ $event->category->slug }}" class="text-decoration-none">{{ $event->category->name }}</a>
      </p>
      
      <p>{{ $event->excerpt }}</p>
    </article>
    <hr>
  @endforeach

@endsection
