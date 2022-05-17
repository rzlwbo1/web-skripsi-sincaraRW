
@extends('layouts.app')

@section('content')

  <a href="/acara/add" class="btn btn-primary mb-3" style="font-size: 1.2rem"><i class="bi bi-plus-circle-fill" style="font-size: 1.2rem"></i> buat Informasi  baru</a>


  @foreach ($events as $event)
      <div class="my-4">
        <a href="/acara/{{ $event->slug }}" class="text-decoration-none">
          <h2>{{ $event->title }}</h2>
        </a>
        <p>By. <a href="/users/{{ $event->user->id }}">{{ $event->user->name }}</a> dalam kategori <a href="/categories/{{ $event->category->slug }}" class="text-decoration-none">{{ $event->category->name }}</a></p>

        <p>{{ $event->excerpt }}</p>
  
        <a href="/acara/{{ $event->id }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil"> Edit</i></a>

        <form action="/acara/{{ $event->id }}" method="post" class="mt-2">
          @csrf
          @method('DELETE')

          <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
        </form>

        <hr>
      </div>
  @endforeach

@endsection
