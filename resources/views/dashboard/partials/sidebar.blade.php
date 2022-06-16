<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
  <div class="sidebar-brand d-none d-md-flex">
    <h4><a href="/" class="text-white text-decoration-none">Sincara RW 014</a></h4>
    {{-- <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
      <use xlink:href="/admin/assets/brand/coreui.svg#full"></use>
    </svg> --}}
    <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
      <use xlink:href="/admin/assets/brand/coreui.svg#signet"></use>
    </svg>
  </div>

  <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
        <svg class="nav-icon">
          <use xlink:href="/admin/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
        </svg> Dashboard
      </a>
    </li>
    <li class="nav-title">Kelola Informasi & Acara</li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard/informations*') ? 'active' : '' }}" href="/dashboard/informations">
        <svg class="nav-icon">
          <use xlink:href="/admin/vendors/@coreui/icons/svg/free.svg#cil-newspaper"></use>
        </svg>
         Informasi
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard/events*') ? 'active' : '' }}" href="/dashboard/events">
        <svg class="nav-icon">
          <use xlink:href="/admin/vendors/@coreui/icons/svg/free.svg#cil-calendar"></use>
        </svg> Acara
      </a>
    </li>

    <li class="nav-title">Laporan</li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard/report*') ? 'active' : '' }}" href="/dashboard/report">
        <svg class="nav-icon">
          <use xlink:href="/admin/vendors/@coreui/icons/svg/free.svg#cil-print"></use>
        </svg> Cetak Laporan
      </a>
    </li>


    @can('admin')
      <li class="nav-title">Administrator</li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
          <svg class="nav-icon">
            <use xlink:href="/admin/vendors/@coreui/icons/svg/free.svg#cil-grid"></use>
          </svg>
          Kelola Category
        </a>
      </li>
    @endcan


    {{-- <li class="nav-title">Components</li>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
          <use xlink:href="/admin/vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
        </svg> Base</a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="base/accordion.html"><span class="nav-icon"></span> Accordion</a></li>
        <li class="nav-item"><a class="nav-link" href="base/breadcrumb.html"><span class="nav-icon"></span> Breadcrumb</a></li>
        <li class="nav-item"><a class="nav-link" href="base/cards.html"><span class="nav-icon"></span> Cards</a></li>
        <li class="nav-item"><a class="nav-link" href="base/carousel.html"><span class="nav-icon"></span> Carousel</a></li>
        <li class="nav-item"><a class="nav-link" href="base/collapse.html"><span class="nav-icon"></span> Collapse</a></li>
        <li class="nav-item"><a class="nav-link" href="base/list-group.html"><span class="nav-icon"></span> List group</a></li>
        <li class="nav-item"><a class="nav-link" href="base/navs.html"><span class="nav-icon"></span> Navs &amp; Tabs</a></li>
        <li class="nav-item"><a class="nav-link" href="base/pagination.html"><span class="nav-icon"></span> Pagination</a></li>
        <li class="nav-item"><a class="nav-link" href="base/placeholders.html"><span class="nav-icon"></span> Placeholders</a></li>
        <li class="nav-item"><a class="nav-link" href="base/popovers.html"><span class="nav-icon"></span> Popovers</a></li>
        <li class="nav-item"><a class="nav-link" href="base/progress.html"><span class="nav-icon"></span> Progress</a></li>
        <li class="nav-item"><a class="nav-link" href="base/scrollspy.html"><span class="nav-icon"></span> Scrollspy</a></li>
        <li class="nav-item"><a class="nav-link" href="base/spinners.html"><span class="nav-icon"></span> Spinners</a></li>
        <li class="nav-item"><a class="nav-link" href="base/tables.html"><span class="nav-icon"></span> Tables</a></li>
        <li class="nav-item"><a class="nav-link" href="base/tooltips.html"><span class="nav-icon"></span> Tooltips</a></li>
      </ul>
    </li> --}}

  </ul>
  <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>