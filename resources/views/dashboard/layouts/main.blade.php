<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Sistem Informasi Acara RW</title>

    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="/admin/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="/admin/css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="/admin/css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="/admin/css/examples.css" rel="stylesheet">
  </head>
  <body>
    {{-- Sidebar --}}

    @include('../dashboard.partials.sidebar')

    {{-- Sidebar end --}}

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">

      {{-- Headers white --}}

      @include('../dashboard.partials.header')

      {{-- Headers white --}}

      @yield('content-admin')


      @include('../dashboard.partials.footer')

    </div>

    
    <!-- CoreUI and necessary plugins-->
    <script src="/admin/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="/admin/vendors/simplebar/js/simplebar.min.js"></script>
    <script>
    </script>

  </body>
</html>