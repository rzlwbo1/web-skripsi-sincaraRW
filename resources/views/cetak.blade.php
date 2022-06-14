<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Cetak laporan</title>
</head>
<body>

  <div class="container-fluid py-4">
    <h2 class="text-center">Laporan Acara</h2>
    <p class="text-center">Tanggal : {{ $res->start }} - {{ $res->end }}</p>

    <div class="container py-4">
      <table class="table table-bordered border-dark table-sm">
        <tr class="text-center">
          <th style="width: 70px">No</th>
          <th>Kategori</th>
          <th>Lokasi</th>
          <th>Tanggal</th>
        </tr>
  
        @foreach ($reports as $report)
          <tr>
            <th class="text-center">{{ $loop->iteration }}</th>
            <td>{{ $report->categoryEvent->name }}</td>
            <td>{{ $report->location }}</td>
            <td id="date">{{ $report->date_at }}</td>
          </tr>
        @endforeach
      </table>


      <div class="signature text-end" style="margin-top: 15%">
        <h6>Ketua RW 014</h6>
        <br><br>
        <p>Caswan</p>
      </div>
    </div>
  </div>


  <script>
    window.onload = function() {


      const dateElem = document.querySelectorAll('#date');

      dateElem.forEach((d) => {
        const newDate = new Date(d.innerHTML).toDateString();
        d.innerHTML = newDate

      })


      // console.log(newDate);

    }

  </script>
</body>
</html>