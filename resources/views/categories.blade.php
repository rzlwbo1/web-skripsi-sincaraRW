
@extends('layouts.app')

@section('content')

<h2>Semua Kategori</h2>
<div class="container overflow-hidden mt-4">
  <div class="row gy-3">
    @foreach ($categories as $cat)
      <div class="col-md-2 col-lg-4">
        <div class="card">
          <a href="/acara?category={{ $cat->slug }}" class="stretched-link text-reset text-decoration-none">
            <div class="card-body d-md-flex align-items-center">
              <div class="icon">
                <img src="/icons/{{ $cat->slug }}.svg" alt="{{ $cat->name }}" class="img-fluid" width="25">
              </div>
              <h3 class="card-title mb-0 ms-2">{{ $cat->name }}</h3>
            </div>
          </a>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
