@extends('dashboard.layouts.main')

@section('content-admin')
  <div class="body flex-grow-1 px-3">
    <div class="container-lg">
      <div class="row mb-4">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h1 class="my-2 my-md-3">{{ $info->title }}</h1>


                @if ($info->image)
                  <img src="{{ asset('storage/' . $info->image) }}" alt="images" class="img-fluid rounded" style="height: 350px;">  
                @else
                  <img src="https://picsum.photos/seed/information/300" alt="images">
                @endif
                <hr>

                <h5>Kategori : {{ $info->categoryInformation->name }}</h5>

                <h5 class="bg-info text-white d-inline-block rounded px-3 py-2">Prioritas : {{ $info->priority }}</h5>
                <p class="fs-5 mb-1 mt-3">{!! $info->body !!}</p>

                <h6>Surat Terkait : <a href="{{ $info->letter }}">Download</a></h6>
            </div>
          </div>
        </div>

        <div class="col-lg position-relative">
          <div class="aksi-detail position-sticky">
            <a href="/dashboard/informations" class="btn btn-secondary text-white mb-2">
              Kembali ke semua acara
            </a>

            <a href="/dashboard/informations/{{ $info->id }}/edit" class="btn text-body btn-warning mb-2">
              Edit Acara
            </a>

            <form action="/dashboard/informations/{{ $info->id }}" method="post" title="hapus" onclick="return confirm('yakin ingin menghapus?')">
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