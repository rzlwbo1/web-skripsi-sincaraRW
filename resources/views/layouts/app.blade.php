<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <title>Sistem Informasi Acara RW 014 | {{ $title }}</title>
  </head>
  <body>

    {{-- ini directieve include beda dgn yield dan section --}}
    @include('../partials.navbar')

    <div class="container mt-4">
      @yield('content')
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="/js/bootstrap.bundle.js"></script>
    <script>
      window.addEventListener('DOMContentLoaded', (evt) => {

        if(document.querySelector('.date')) {
          let dateElem = document.querySelector('.date');
          let date = new Date(dateElem.textContent).toDateString();
          document.querySelector('.date').innerHTML = date;
          // console.log(1);
        }

      });
    </script>

  </body>
</html>