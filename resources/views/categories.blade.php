
@extends('layouts.app')

@section('content')

<h2>Semua Kategori</h2>
  @foreach ($categories as $cat)
      <div class="my-3">
        <a href="/categories/{{ $cat->slug }}">
          <h3>{{ $cat->name }}</h3>
        </a>
      </div>
  @endforeach

@endsection
