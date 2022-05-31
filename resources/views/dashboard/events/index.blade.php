@extends('dashboard.layouts.main')


@section('content-admin')
<div class="body flex-grow-1 px-3">
  <div class="container-lg">
    <h2>Kumpulan Informasi</h2>

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
          @foreach ($infos as $info)
            <tr>
              <th scope="row" class="text-center">{{ $loop->iteration }}</th>
              <td>{{ $info->title }}</td>
              <td>{{ $info->priority }}</td>
              <td>{{ $info->category->name }}</td>
              <td class="d-flex justify-content-evenly">
                <a href="/dashboard/events/{{ $info->slug }}" class="btn btn-sm btn-light">
                  <img src="/admin/assets/icons/eye.svg" alt="show icon" width="25">
                </a>

                <a href="" class="btn btn-sm btn-info">
                  <img src="/admin/assets/icons/pencil.svg" alt="show icon" width="25">
                </a>

                <a href="" class="btn btn-sm btn-danger">
                  <img src="/admin/assets/icons/x-circle.svg" alt="show icon" width="25">
                </a>
              </td>
            </tr> 
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection