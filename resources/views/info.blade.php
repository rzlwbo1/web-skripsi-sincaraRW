@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-10">
      <article>
        <h1 class="my-2 my-md-3">{{ $info->title }}</h1>

        @if ($info->image)
          <img src="{{ asset('storage/' . $info->image) }}" alt="images" class="img-fluid" style="border-radius: 0; height: 350px;">  
        @else
          <img src="https://picsum.photos/seed/information/300" alt="images">
        @endif

        <p class="text-muted mt-4">Pembuat : <a href="/acara?users={{ $info->user->username }}" class="text-reset">{{ $info->user->name }}</a> dalam kategori <a href="/acara?category_event={{ $info->categoryInformation->slug }}" class="text-reset">{{ $info->categoryInformation->name }}</a></p>

        <hr>
        <p class="fs-5 mb-1 mt-3">{!! $info->body !!}</p>

        <h6>Surat Terkait : <a href="{{ $info->letter }}">Download</a></h6>

        <br>
        <a href="/informasi" role="button" class="btn btn-outline-dark">Kembali</a>
      </article>
    </div>
  </div>
@endsection