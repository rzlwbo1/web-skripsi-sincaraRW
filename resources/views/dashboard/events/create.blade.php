@extends('dashboard.layouts.main')

@section('content-admin')
  <div class="body flex-grow-1 px-3">
    <div class="container-lg">
      <div class="field-post pb-3">
        <h2>Membuat acara baru</h2>
        <hr>
        <form action="/dashboard/events" method="post">
          @csrf
          
          <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          {{-- <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="body" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
          </div> --}}
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input id="x" type="hidden" name="body">
            <trix-editor input="x"></trix-editor>
          </div>
      
          <div class="mb-3 w-25">
            <label for="prioritas" class="form-label">Prioritas</label>
            <input type="number" class="form-control" id="prioritas" name="priority">
            <small class="text-body">*berupa angka 1-10</small>
          </div>
    
          <div class="mb-3 w-25">
            <label for="category">Kategori</label>
            <select name="category_id" id="category" class="form-select">
              <option value="0">--Pilih kategori--</option>
              @foreach ($category as $cat)
              <option value="{{ $cat->id }}">{{ $cat->name }}</option>
              @endforeach
            </select>
          </div>
      
          <div class="mb-3 w-25">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="publish_at">
          </div>
      
          <div class="mb-3 w-25">
            <label for="Waktu" class="form-label">Waktu</label>
            <input type="time" class="form-control" id="Waktu" name="time_at">
          </div>
      
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>


  <script>
    document.addEventListener('trix-file-accept', function(evt) {
      evt.preventDefault();
    })
  </script>
@endsection