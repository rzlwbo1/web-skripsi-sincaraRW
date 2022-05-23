
@extends('layouts.app')

@section('content')

  <div class="row justify-content-center">
    <div class="col-md-10">
      <article>
        <h1 class="my-2 my-md-3">{{ $event->title }}</h1>

        <img src="https://picsum.photos/seed/{{ $event->category->slug }}/300" alt="images">

        <p class="text-muted mt-4">Pembuat : <a href="/users/{{ $event->user->username }}" class="text-reset">{{ $event->user->name }}</a> dalam kategori <a href="/acara?category{{ $event->category->slug }}" class="text-reset">{{ $event->category->name }}</a></p>
        {{-- <p>{{ $event->body }}</p> --}}

        <p class="fs-5 mb-1 mt-5">{!! $event->body !!}</p>

        <br>
        <a href="/acara" role="button" class="btn btn-outline-dark">Kembali</a>
      </article>
    </div>
  </div>
@endsection



