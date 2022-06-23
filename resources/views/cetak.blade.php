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

    <div class="container py-4 table-responsive-md">
      <table class="table table-bordered">

        <tr>
          <th>ID Acara</th>
          <th>Link acara</th>
          <th>Nama Acara</th>
          <th>Tanggal</th>
          <th>Waktu</th>
          <th>Kategori</th>
          <th>Prioritas</th>
          <th>Surat Terkait</th>
        </tr>

        @if ($reports->count() > 0)
          @foreach ($reports as $rep)
            <tr>
              <td>{{ $rep->id }}</td>
              <td><a href="http://127.0.0.1:8000/acara/{{ $rep->slug }}">http://127.0.0.1:8000/acara/{{ $rep->slug }}</a></td>
              <td>{{ $rep->title }}</td>
              <td>{{ $rep->date_at }}</td>
              <td>{{ $rep->time_at }}</td>
              @if ($rep->categoryEvent->name == 'Formal')
              <th>{{ $rep->categoryEvent->name }}</th>
              @else
              <td>{{ $rep->categoryEvent->name }}</td>
              @endif
              <td>{{ $rep->priority }}</td>
              <td><a href="/download/{{ $rep->letter }}">Surat</a></td>
            </tr>  
          @endforeach
        @else
          <tr>
            <td colspan="8" class="text-center text-danger">
              <h4>Tidak ada acara pada rentang tanngal ini</h4>  
            </td>  
          </tr>  
        @endif
      </table>

      <table class="table table-bordered mt-5">
        <tr>
          <th>Total Acara</th>
          <td>{{ $reports->count() }}</td>
        </tr>

        <tr>
          <th>Total Acara Penting 
            <small>prioritas = 1</small>
          </th>
          <td>{{ $sum[0] }}</td>
        </tr>

        <tr>
          <th>Total Kategori Formal</th>
          <td>{{ $sum[1] }}</td>
        </tr>

        <tr>
          <th>Total Kategori Non-Formal</th>
          <td>{{ $sum[2] }}</td>
        </tr>

        <tr>
          <th>Total Kategori Undangan</th>
          <td>{{ $sum[3] }}</td>
        </tr>
      </table>


      <div class="signature text-end mt-5">
        <h6 class="mb-4">Ketua RW 014</h6>
        <br><br>
        <p>Syafwan</p>
      </div>
    </div>
  </div>

</body>
</html>


{{-- <table class="table table-bordered" cellpadding="3">

  @if ($reports->count() > 0)
    @foreach ($reports as $rep)
      <tr>
        <th class="text-center">Nama Acara</th>
        <th colspan="5" class="text-center">{{ $rep->title }}</th>
      </tr>

      <tr>
        <th rowspan="3" style="padding: 50px 0; text-align:center;">
          Detail
        </th>
        <th>Kategori</th>
        <th>Lokasi</th>
        <th>Waktu</th>
        <th>Tanggal</th>
        <th>Prioritas</th>
      </tr>

      <tr>
        <td>{{ $rep->categoryEvent->name }}</td>
        <td>{{ $rep->location }}</td>
        <td>{{ $rep->time_at }}</td>
        <td>{{ $rep->date_at }}</td>
        <td>{{ $rep->priority }}</td>
      </tr>
      
      <tr>
        <td colspan="5" class="text-center">http://127.0.0.1:8000/acara/{{ $rep->slug }}</td>
      </tr>
    @endforeach
  @else
      
  @endif
</table> --}}