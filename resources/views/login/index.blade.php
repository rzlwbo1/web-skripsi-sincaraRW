@extends('layouts.app')

@section('content')
  <div class="d-grid form">
    <main class="form-signin text-center border rounded">
      <form action="/login" method="post">
        @csrf

        {{-- session() itu helper --}}
        @if (session('status'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Horee!</strong> {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif


        @if (session('loginErr'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('loginErr') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <h1 class="h3 mb-3">Masuk Akun</h1>
  
        <div class="form-floating">
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailField" placeholder="email@example.com" name="email" value="{{ old('email') }}" autofocus required>
          <label for="emailField">Email address</label>
          @error('email')
            <div class="invalid-feedback text-start">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="passwordField" placeholder="Password" name="password" required>
          <label for="passwordField">Password</label>
        </div>
  
        <button class="w-100 btn btn-primary btn-lg" type="submit">Masuk</button>
        <p class="mt-3">Register ?<a href="/register">Register</a></p>
      </form>
    </main>
  </div>
@endsection