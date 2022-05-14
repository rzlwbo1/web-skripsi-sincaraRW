
@extends('layouts.app')

@section('content')

  <a href="/acara/add" class="btn btn-primary mb-3" style="font-size: 1.2rem"><i class="bi bi-plus-circle-fill" style="font-size: 1.2rem"></i> buat Informasi  baru</a>


  @foreach ($events as $event)
      <div class="my-4">
        <a href="/acara/{{ $event->slug }}">
          <h2>{{ $event->title }}</h2>
        </a>
        <h4>{{ $event->author }}</h4>
        <p>{{ $event->excerpt }}</p>
  
        <a href="/acara/{{ $event->id }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil"> Edit</i></a>

        <form action="/acara/{{ $event->id }}" method="post" class="mt-2">
          @csrf
          @method('DELETE')

          <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
        </form>

      </div>
  @endforeach

@endsection
