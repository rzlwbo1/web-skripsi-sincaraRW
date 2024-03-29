
@extends('layouts.app')

@section('content')


  <a href="/acara/add" class="btn btn-primary mb-3" style="font-size: 1.2rem"><i class="bi bi-plus-circle-fill" style="font-size: 1.2rem"></i> buat Informasi  baru</a>

  <h1>{{ $titleSub }}</h1>

  <div class="search-field">
    <div class="container">
      <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-6">
          <form action="/acara">
            
            @if (request('category'))
              <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

            @if (request('users'))
              <input type="hidden" name="users" value="{{ request('users') }}">
            @endif

            <div class="input-group mb-3">
              <input type="search" class="form-control" placeholder="Cari informasi, Acara, Kegiatan" name="search_query" value="{{ request('search_query') }}">
              <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @if (count($events) > 0)
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 my-3">
    @foreach ($events as $event)

      <div class="col">
        <div class="card">
          <p class="card-header"><a href="/acara?category={{ $event->category->slug }}">{{ $event->category->name }}</a></p>
    
          @if ($event->image)
            <img src="{{ asset('storage/' . $event->image) }}" alt="images" class="img-fluid card-image-top" style="border-radius: 0;">  
          @else
            <img src="https://picsum.photos/seed/{{ $event->category->slug }}/300" alt="images" class="img-fluid card-image-top" style="border-radius: 0;" height="250">
          @endif
    
          <div class="card-body">
            <h3 class="card-title">
              <a href="/acara/{{ $event->slug }}" class="text-reset text-black text-decoration-none">{{ $event->title }}</a>
            </h3>

            <h6 class="card-subtitle text-muted my-3">
              Pembuat : <a href="/acara?users={{ $event->user->username }}">{{ $event->user->name }}</a>
            </h6>
            
            <p class="text-muted">Pada pukul : {{ $event->time_at }}</p>
            <p class="card-text">{{ $event->excerpt }}</p>

            <a href="/acara/{{ $event->slug }}" class="btn btn-primary w-100">Baca selengkapnya</a>
          </div>
    
        </div>
      </div>
    @endforeach
    </div>
  @else
    <p>Tidak ada acara & informasi</p>
  @endif

  <div class="row">
    <div class="col-md-3 offset-md-10">
      <div class="pagination">
        {{ $events->links() }}
      </div>
    </div>
  </div>

@endsection
