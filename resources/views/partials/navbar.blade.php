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

          <a class="nav-link {{ $active === "acara" ? 'active' : '' }}" href="/acara">Acara RW</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $active === "about" ? 'active' : '' }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $active === "categories" ? 'active' : '' }}" href="/categories">Kategori</a>
        </li>
      </ul>
    </div>
  </div>
</nav>