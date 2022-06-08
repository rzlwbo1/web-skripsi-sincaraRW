@extends('dashboard.layouts.main')


@section('content-admin')
<div class="body flex-grow-1 px-3">
  <div class="container-lg">
    <h2>Kumpulan Informasi</h2>


      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
      </svg>
    
      {{-- alert success --}}
      @if (session('success'))
        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
          <div>
            {{ session('success') }}
          </div>
          <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
        </div>

        @elseif (session('deleted'))
        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
          <div>
            {{ session('deleted') }}
          </div>
          <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

    <a href="/dashboard/events/create" class="btn btn-primary">Buat Acara baru</a>

    <div class="table-responsive table-informations my-3 bg-white">
      <table class="table table-bordered table-hover">
        <thead>
          <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Judul Informasi</th>
            <th scope="col">Prioritas</th>
            <th scope="col">Kategori</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>

        <tbody>
          @if (count($events) > 0)
            @foreach ($events as $event)
              <tr>
                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                <td>{{ $event->title }}</td>
                <td>{{ $event->priority }}</td>
                <td>{{ $event->categoryEvent->name }}</td>
                <td class="d-flex justify-content-evenly">
                  <a href="/dashboard/events/{{ $event->slug }}" class="btn btn-sm btn-light">
                    <img src="/admin/assets/icons/eye.svg" alt="show icon" width="25">
                  </a>

                  <a href="/dashboard/events/{{ $event->slug }}/edit" class="btn btn-sm btn-info">
                    <img src="/admin/assets/icons/pencil.svg" alt="show icon" width="25">
                  </a>

                  <form action="/dashboard/events/{{ $event->slug }}" method="post" title="hapus">
                    @method('delete')
                    @csrf
                    <button class="btn btn-sm btn-danger" onclick="return confirm('yakin ingin menghapus?')">
                      <img src="/admin/assets/icons/x-circle.svg" alt="show icon" width="25">
                    </button>
                  </form>
                </td>
              </tr> 
            @endforeach
          @else
            <tr>
              <td colspan="5" class="text-center">
               <div class="container">
                <div class="row">
                  <div class="col-12">
                    <div class="py-3">
                      <h4>Tidak ada acara</h4>
                      <a href="/dashboard/events/create" class="btn btn-primary mt-3">Buat Acara baru</a>
                    </div>
                  </div>
                </div>
               </div>
              </td>
            </tr>
          @endif
          
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection