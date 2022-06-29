
{{-- pake layoutnya dlu jgn lupa --}}
@extends('layouts.app')


{{-- isi dri yield nya juga perlu --}}
@section('content')
  <div class="container mt-3">
    <h2>Rekomendasi Informasi & Acara terkini</h2>
    <hr>

    <h3>Informasi</h3>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 my-3 main">
      @foreach ($informations as $info)

        <div class="col">
          <div class="card">
            <p id="prioritas" hidden>{{ $info->priority }}</p>
            <p class="card-header"><a href="/informasi?category_info={{ $info->categoryInformation->slug }}">{{ $info->categoryInformation->name }}</a></p>
      
            @if ($info->image)
              <img src="{{ asset('storage/' . $info->image) }}" alt="images" class="img-fluid card-image-top" style="border-radius: 0;">  
            @else
              <img src="https://picsum.photos/seed/informasi/200" alt="images" class="img-fluid card-image-top" style="border-radius: 0;" height="250">
            @endif
      
            <div class="card-body">
              <h3 class="card-title">
                <a href="/informasi/{{ $info->slug }}" class="text-reset text-black text-decoration-none">{{ $info->title }}</a>
              </h3>

              <h6 class="card-subtitle text-muted my-3">
                Pembuat : <a href="/acara?users=">{{ $info->user->name }}</a>
                {{ $info->updated_at->format('l j F Y h:i:s') }}
              </h6>


              <p class="card-text">{!! $info->excerpt !!}</p>

              <a href="/informasi/{{ $info->slug }}" class="btn btn-primary w-100">Baca selengkapnya</a>
            </div>
      
          </div>
        </div>
      @endforeach
    </div>

    <br>
    <hr>

    <h3>Acara</h3>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 my-3 main">
      @foreach ($events as $event)

        <div class="col">
          <div class="card">
            <p hidden id="prioritas">{{ $event->priority }}</p>
            <p class="card-header"><a href="/acara?category_event={{ $event->categoryEvent->slug }}">{{ $event->categoryEvent->name }}</a></p>
      
            @if ($event->image)
              <img src="{{ asset('storage/' . $event->image) }}" alt="images" class="img-fluid card-image-top" style="border-radius: 0;">  
            @else
              <img src="https://picsum.photos/seed/{{ $event->categoryEvent->slug }}/300" alt="images" class="img-fluid card-image-top" style="border-radius: 0;" height="250">
            @endif
      
            <div class="card-body">
              <h3 class="card-title">
                <a href="/acara/{{ $event->slug }}" class="text-reset text-black text-decoration-none">{{ $event->title }}</a>
              </h3>

              <h6 class="card-subtitle text-muted my-3">
                Pembuat : <a href="/acara?users={{ $event->user->username }}">{{ $event->user->name }}</a>
              </h6>
              
              <p class="text-muted mb-1">Pada tanggal : <span class="date">{{ $event->date_at }}</span></p>
              <p class="text-muted">Pada pukul : {{ $event->time_at }}</p>
              <p class="card-text">{{ $event->excerpt }}</p>

              <a href="/acara/{{ $event->slug }}" class="btn btn-primary w-100">Baca selengkapnya</a>
            </div>
      
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
