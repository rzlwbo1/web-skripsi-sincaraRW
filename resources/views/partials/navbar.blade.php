<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/">Sistem Informasi RW</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ $active === "beranda" ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
        </li>
        <li class="nav-item">

          <a class="nav-link {{ $active === "acara" ? 'active' : '' }}" href="/acara">Informasi & Acara</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $active === "categories" ? 'active' : '' }}" href="/categories">Kategori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $active === "about" ? 'active' : '' }}" href="/about">About</a>
        </li>
      </ul>

      {{-- login and regis link --}}
      <ul class="navbar-nav ms-auto">

        {{-- kasih dropdown kalo udah login --}}
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Halo, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="/dashboard">Dashboard Saya</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button class="dropdown-item">Keluar</button>
                </form>
              </li>
            </ul>
          </li>
        @endauth

        @guest
          <li class="nav-item">
            <a class="nav-link {{ $active === "login" ? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Masuk</a>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>