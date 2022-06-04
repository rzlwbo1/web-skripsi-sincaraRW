@extends('dashboard.layouts.main')

@section('content-admin')
  <div class="body flex-grow-1 px-3">
    <div class="container-lg">
      <div class="field-post pb-3">
        <h2>Membuat acara baru</h2>
        <hr>
        <form action="/dashboard/events" method="post" enctype="multipart/form-data">
          @csrf
          
          <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required autofocus>
            @error('title')
              <div class="invalid-feedback">Judul wajib di isi</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Gambar (opsional)</label>
            <input class="form-control" type="file" id="image" name="image">
          </div>
      
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            @error('body') 
              <p class="text-danger">Deskripsi wajib di is</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body') }}" class=" @error('body') is-invalid @enderror">
            <trix-editor input="body"  required></trix-editor>
          </div>
      
          <div class="mb-3 w-25">
            <label for="prioritas" class="form-label">Prioritas</label>
            <input type="number" class="form-control  @error('priority') is-invalid @enderror" id="prioritas" name="priority" value="{{ old('priority') }}" required>
            <small class="text-body">*berupa angka 1-10</small>
            @error('priority')
              <div class="invalid-feedback">Priorotas wajib di isi</div>
            @enderror
          </div>
    
          <div class="mb-3 w-25">
            <label for="category">Kategori</label>
            <select name="category_id" id="category" class="form-select @error('category_id') is-invalid @enderror" required>
              <option value="0">--Pilih kategori--</option>
              @foreach ($category as $cat)
                @if (old('category_id') == $cat->id)
                <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                @else
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endif
              @endforeach
            </select>
            @error('category_id')
              <div class="invalid-feedback">Kategori wajib di isi</div>
            @enderror
          </div>
      
          <div class="mb-3 w-25">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control @error('publish_at') is-invalid @enderror" id="tanggal" name="publish_at" value="{{ old('publish_at') }}" required>
            @error('publish_at')
              <div class="invalid-feedback">Tanggal wajib di isi</div>
            @enderror
          </div>
      
          <div class="mb-3 w-25">
            <label for="Waktu" class="form-label">Waktu</label>
            <input type="time" class="form-control @error('time_at') is-invalid @enderror" id="Waktu" name="time_at" value="{{ old('time_at') }}" required>
            @error('time_at')
              <div class="invalid-feedback">Waktu wajib di isi</div>
            @enderror
          </div>
      
          <button type="submit" class="btn btn-primary">Tambah Acara</button>
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