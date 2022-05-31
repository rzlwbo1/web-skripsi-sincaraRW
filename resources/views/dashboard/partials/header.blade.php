<header class="header header-sticky mb-4">
  <div class="container-fluid">
    <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
      <svg class="icon icon-lg">
        <use xlink:href="/admin/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
      </svg>
    </button>
    <a class="header-brand d-md-none" href="#">
      <h4>Sincara RW014</h4>
      {{-- <svg width="118" height="46" alt="CoreUI Logo">
        <use xlink:href="/admin/assets/brand/coreui.svg#full"></use>
      </svg> --}}
    </a>
    <ul class="header-nav d-none d-md-flex">
      <li class="nav-item"><a class="nav-link active fw-bold" href="/">Dashboard</a></li>
      <li class="nav-item"><a class="nav-link" href="">Users</a></li>
      {{-- <li class="nav-item"><a class="nav-link" href="">Settings</a></li> --}}
    </ul>
    <ul class="header-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="#">
          <svg class="icon icon-lg">
            <use xlink:href="/admin/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
          </svg></a></li>
    </ul>
    <ul class="header-nav ms-3">
      <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <div class="avatar avatar-md"><img class="avatar-img" src="/admin/assets/img/avatars/9.jpg" alt="user@email.com"></div>
        </a>
        <div class="dropdown-menu dropdown-menu-end pt-0">
          <div class="dropdown-header bg-light py-2">
            <div class="fw-semibold">Menu</div>
          </div>
          {{-- <div class="dropdown-divider"></div> --}}

          <a href="" class="dropdown-item">
            <svg class="icon me-2">
              <use xlink:href="/admin/vendors/@coreui/icons/svg/free.svg#cil-browser"></use>
            </svg>
             Website</a>

          <form action="/logout" method="post">
            @csrf
            <button class="dropdown-item">
              <svg class="icon me-2">
                <use xlink:href="/admin/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
              </svg> 
              Keluar
            </button>
          </form>
        </div>
      </li>
    </ul>
  </div>
  <div class="header-divider"></div>
  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-0 ms-2">
        <li class="breadcrumb-item">
          <!-- if breadcrumb is single--><span>Dashboard</span>
        </li>
        <li class="breadcrumb-item active"><span>{{ Str::of($state)->ucfirst() }}</span></li>
      </ol>
    </nav>
  </div>
</header>