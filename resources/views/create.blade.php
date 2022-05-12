
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Acara baru</title>
</head>
<body>

  
  <div class="container py-3">
    <h2>Membuat acara baru</h2>

    <form action="/acara" method="post">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="body" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
      </div>
  
      <div class="mb-3">
        <label for="prioritas" class="form-label">Prioritas</label>
        <input type="text" class="form-control" id="prioritas" name="priority">
      </div>
  
      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="publish_at">
      </div>
  
      <div class="mb-3">
        <label for="Waktu" class="form-label">Waktu</label>
        <input type="time" class="form-control" id="Waktu" name="time_at">
      </div>
  
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>