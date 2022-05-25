@extends('layouts.app')

@section('content')
  <div class="d-grid form">
    <main class="form-signin text-center border rounded">
      <form>
        {{-- session() itu helper --}}
        @if (session('status'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Horee!</strong> {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <h1 class="h3 mb-3">Masuk Akun</h1>
  
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
  
        <button class="w-100 btn btn-primary btn-lg" type="submit">Masuk</button>
        <p class="mt-3">Register ?<a href="/register">Register</a></p>
      </form>
    </main>
  </div>
@endsection