@extends('dashboard.layouts.main')

@section('content-admin')
  <div class="body flex-grow-1 px-3">
    <div class="container-lg">
      <div class="row mb-4">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h1 class="my-2 my-md-3">{{ $event->title }}</h1>


                @if ($event->image)
                  <img src="{{ asset('storage/' . $event->image) }}" alt="images" class="img-fluid rounded" style="height: 350px;">  
                @else
                  <img src="https://picsum.photos/seed/{{ $event->category->slug }}/300" alt="images">
                @endif
                <hr>

                <h5 class="bg-info text-white d-inline-block rounded px-3 py-2">Prioritas : {{ $event->priority }}</h5>
                <div class="agenda">
                  <h5>Hari & Tanggal : <span class="date">{{ $event->publish_at }}</span></h5>
                  <h5>Waktu : {{ $event->time_at }}</h5>
                </div>
                <p class="fs-5 mb-1 mt-3">{!! $event->body !!}</p>
            </div>
          </div>
        </div>

        <div class="col-lg position-relative">
          <div class="aksi-detail position-sticky">
            <a href="/dashboard/events" class="btn btn-secondary text-white mb-2">
              Kembali ke semua acara
            </a>

            <form>
              @csrf
              <button type="submit" class="btn text-body btn-warning mb-2">Edit informasi</button>
            </form>

            <form action="/dashboard/events/{{ $event->slug }}" method="post" title="hapus">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger text-white">Hapus informasi</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection