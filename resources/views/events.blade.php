
@extends('layouts.app')

@section('content')

  @foreach ($events as $event)
      <a href="/acara/{{ $event['slug'] }}">
        <h2>{{ $event['title'] }}</h2>
      </a>
      <h4>{{ $event['author'] }}</h4>
      <p>{{ $event['body'] }}</p>
  @endforeach

@endsection
