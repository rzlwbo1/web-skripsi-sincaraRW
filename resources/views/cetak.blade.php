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
    @php
      date_default_timezone_set("Asia/Jakarta");
      $start = date_create($res->start);
      $end = date_create($res->end);
    @endphp
    <p class="text-center">Tanggal : {{ date_format($start, 'd-m-Y'); }} - {{ date_format($end, 'd-m-Y')}}</p>

    <div class="container py-4">
      <table class="table table-bordered border-dark table-sm">
        <tr class="text-center">
          <th style="width: 70px">No</th>
          <th>Kategori</th>
          <th>Lokasi</th>
          <th>Tanggal</th>
        </tr>
        
        @if ($reports->count() > 0)
          @foreach ($reports as $report)
          @php
            date_default_timezone_set("Asia/Jakarta");
            $dateObj = date_create($report->date_at);
          @endphp
            <tr>
              <th class="text-center">{{ $loop->iteration }}</th>
              <td>{{ $report->categoryEvent->name }}</td>
              <td>{{ $report->location }}</td>
              <td id="date">{{ date_format($dateObj, "d-m-Y"); }}</td>
            </tr>
          @endforeach  
        @else
          <tr>
            <td colspan="4" class="text-center text-danger fw-bold">Tidak ada Acara pada rentang tanggal berikut</td>
          </tr>
        @endif
      </table>

      <div class="signature text-end" style="margin-top: 15%">
        <h6>Ketua RW 014</h6>
        <br><br>
        <p>Syafwan</p>
      </div>
    </div>
  </div>

</body>
</html>