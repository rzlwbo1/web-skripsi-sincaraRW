
@extends('layouts.app')

@section('content')

<h2>Semua Kategori</h2>
<div class="container overflow-hidden mt-4">
  <div class="row gy-3">
    @foreach ($categories as $cat)
      <div class="col-md-2 col-lg-4">
        <div class="card">
          <a href="/categories/{{ $cat->slug }}" class="stretched-link text-reset text-decoration-none">
            <div class="card-body">
              <h3 class="card-title">{{ $cat->name }}</h3>
            </div>
          </a>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
