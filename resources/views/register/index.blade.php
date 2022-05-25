@extends('layouts.app')

@section('content')
  <div class="d-grid form">
    <main class="form-signin text-center border rounded">
      <form action="/register" method="post">
        @csrf
        <h1 class="h3 mb-3">Register Akun</h1>

        <div class="form-floating">
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" name="name" value="{{ old('name') }}" required>
          <label for="name">Name</label>
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" name="username" value="{{ old('username') }}" required>
          <label for="username">Username</label>
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
  
        <div class="form-floating">
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}" required>
          <label for="email">Email address</label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        
        <div class="form-floating">
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" value="{{ old('password') }}" required>
          <label for="password">Password</label>
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
  
        <button class="w-100 btn btn-primary btn-lg" type="submit">Registrasi</button>
        <p class="mt-3">Sudah ada akun ?<a href="/login">masuk</a></p>
      </form>
    </main>
  </div>
@endsection