@extends('layouts.app')

@section('content')
  <h1>{{ $titleSub }}</h1>

  <div class="search-field">
    <div class="container">
      <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-6">
          <form action="/informasi">
            
            @if (request('category_event'))
              <input type="hidden" name="category_event" value="{{ request('category_event') }}">
            @endif

            @if (request('users'))
              <input type="hidden" name="users" value="{{ request('users') }}">
            @endif

            <div class="input-group mb-3">
              <input type="search" class="form-control" placeholder="Cari informasi" name="search_query" value="{{ request('search_query') }}">
              <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @if (count($informations) > 0)
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 my-3">
    @foreach ($informations as $info)

      <div class="col">
        <div class="card">
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


            <p class="card-text">{{ $info->excerpt }}</p>

            <a href="/informasi/{{ $info->slug }}" class="btn btn-primary w-100">Baca selengkapnya</a>
          </div>
    
        </div>
      </div>
    @endforeach
    </div>
  @else
    <p>Tidak ada informasi</p>
  @endif

  <div class="row">
    <div class="col-md-3 offset-md-10">
      <div class="pagination">
        {{ $informations->links() }}
      </div>
    </div>
  </div>

@endsection
