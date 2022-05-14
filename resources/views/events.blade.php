
@extends('layouts.app')

@section('content')

  <a href="/acara/add" class="btn btn-primary mb-3">buat acara baru</a>


  @foreach ($events as $event)
      <div class="my-4">
        <a href="/acara/{{ $event->slug }}">
          <h2>{{ $event->title }}</h2>
        </a>
        <h4>{{ $event->author }}</h4>
        <p>{{ $event->excerpt }}</p>
  
        <a href="/acara/{{ $event->id }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil"> Edit</i></a>
      </div>
  @endforeach

@endsection
