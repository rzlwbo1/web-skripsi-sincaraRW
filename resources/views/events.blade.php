
@extends('layouts.app')

@section('content')

  <h1>{{ $titleSub }}</h1>

  <div class="search-field">
    <div class="container">
      <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-6">
          <form action="/acara">
            
            @if (request('category_event'))
              <input type="hidden" name="category_event" value="{{ request('category_event') }}">
            @endif

            @if (request('users'))
              <input type="hidden" name="users" value="{{ request('users') }}">
            @endif

            <div class="input-group mb-3">
              <input type="search" class="form-control" placeholder="Cari Acara" name="search_query" value="{{ request('search_query') }}">
              <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <button type="button" class="btn-sort btn btn-primary">Prioritaskan</button>
  <p style="display: none;">Hanya bisa 1 kali saja, refresh kembali</p>

  @if (count($events) > 0)
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 my-3 main">
      @foreach ($events as $event)

        <div class="col">
          <div class="card">
            <p hidden id="prioritas">{{ $event->priority }}</p>
            <p class="card-header"><a href="/acara?category_event={{ $event->categoryEvent->slug }}">{{ $event->categoryEvent->name }}</a></p>
      
            @if ($event->image)
              <img src="{{ asset('storage/' . $event->image) }}" alt="images" class="img-fluid card-image-top" style="border-radius: 0;">  
            @else
              <img src="https://picsum.photos/seed/{{ $event->categoryEvent->slug }}/300" alt="images" class="img-fluid card-image-top" style="border-radius: 0;" height="250">
            @endif
      
            <div class="card-body">
              <h3 class="card-title">
                <a href="/acara/{{ $event->slug }}" class="text-reset text-black text-decoration-none">{{ $event->title }}</a>
              </h3>

              <h6 class="card-subtitle text-muted my-3">
                Pembuat : <a href="/acara?users={{ $event->user->username }}">{{ $event->user->name }}</a>
              </h6>
              
              <p class="text-muted mb-1">Pada tanggal : <span class="date">{{ $event->date_at }}</span></p>
              <p class="text-muted">Pada pukul : {{ $event->time_at }}</p>
              <p class="card-text">{{ $event->excerpt }}</p>

              <a href="/acara/{{ $event->slug }}" class="btn btn-primary w-100">Baca selengkapnya</a>
            </div>
      
          </div>
        </div>
      @endforeach
    </div>
  @else
    <p>Tidak ada acara & informasi</p>
  @endif

  <div class="row">
    <div class="col-md-3 offset-md-10">
      <div class="pagination">
        {{-- {{ $events->links() }} --}}
      </div>
    </div>
  </div>

@endsection

<script>

  window.addEventListener('load', function() {

    function insertionSort(arr, n) {
      let i, key, j;
      for (i = 1; i < n; i++) {
        key = arr[i];
        j = i - 1;

        while (j >= 0 && arr[j] > key) {
          arr[j + 1] = arr[j];
          j = j - 1;
        }
        arr[j + 1] = key;
      }

      return arr;
    }

    function showToDom(sortPrio, cards, prio) {

      for(let i = 0; i < sortPrio.length; i++) {

        for(let j = 0; j < prio.length; j++) {

          if(sortPrio[i] == prio[j]) {

            document.querySelector('.main').append(cards[j]);

            // console.log(cards[j].children[0].textContent);
          } 
        }
      }
    }


    const btnSort = document.querySelector(".btn-sort");
    let prioritas = [];
    let sortedCard = [];
    let unSort = []

    btnSort.addEventListener("click", function(evt) {

      // get all card
      const allCard = document.querySelectorAll('.col');


      // ambil priortias
      allCard.forEach((pri, i) => {

        prioritas.push(parseInt(pri.children[0].children[0].innerHTML));
        unSort.push(parseInt(pri.children[0].children[0].innerHTML))

        pri.remove()
        // console.log(pri.children[0].textContent);
      })

      console.log(unSort);

      // sorted prioritas
      prioritas= insertionSort(prioritas, prioritas.length);

      console.log("====");
      console.log(prioritas);

      showToDom(prioritas, allCard, unSort);
      
      btnSort.disabled = true;
      btnSort.style.cursor = 'pointer';
      document.getElementsByTagName('p')[0].style.display = 'block';
      document.getElementsByTagName('p')[0].style.color = 'red';

      // console.log(allCard);

    
    })



  })

</script>
