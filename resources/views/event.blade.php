
@extends('layouts.app')

@section('content')

  <div class="row justify-content-center">
    <div class="col-md-10">
      <article>
        <h1 class="my-2 my-md-3">{{ $event->title }}</h1>

        @if ($event->image)
          <img src="{{ asset('storage/' . $event->image) }}" alt="images" class="img-fluid" style="border-radius: 0; height: 350px;">  
        @else
          <img src="https://picsum.photos/seed/{{ $event->categoryEvent->slug }}/300" alt="images">
        @endif

        <p class="text-muted mt-4">Pembuat : <a href="/acara?users={{ $event->user->username }}" class="text-reset">{{ $event->user->name }}</a> dalam kategori <a href="/acara?category_event={{ $event->categoryEvent->slug }}" class="text-reset">{{ $event->categoryEvent->name }}</a></p>
        {{-- <p>{{ $event->body }}</p> --}}

        <hr>
        <div class="agenda">
          <h5>Hari & Tanggal : <span class="date">{{ $event->date_at }}</span></h5>
          <h5>Waktu : {{ $event->time_at }}</h5>
          <h5>Lokasi : {{ $event->location }}</h5>
        </div>
        <p class="fs-5 mb-1 mt-3">{!! $event->body !!}</p>

        <br>
        <a href="/acara" role="button" class="btn btn-outline-dark">Kembali</a>
      </article>
    </div>
  </div>
@endsection



