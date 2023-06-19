<!DOCTYPE html>
<html>
    @include('shared.head1')
<body>

    @include('shared.nav1')

    <div class="container">
        <div id="start" class="mb-5">
          <div class="carousel-container">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="img/car3.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="img/car1.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="img/car2.jpg" alt="Third slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block w-100" src="img/car4.jpg" alt="Third slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block w-100" src="img/car5.jpg" alt="Third slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block w-100" src="img/car6.jpg" alt="Third slide">
              </div>
            </div>

          </div>
          <div class="carousel-caption text-center text-md-center">
              <h3>Budujemy zaufanie od ponad 20 lat</h3>
            </div>
          </div>
        </div>
      </div>

      <div class="container mb-5">
        <div class="row">
          <div class="col-md-12">
            <div class="text-center">
              <h2 class="mb-4 text-primary font-weight-bold">Prace Wykończeniowe</h2>
              <p class="mb-5">Rozkwitaj w pięknych wnętrzach! Nasza pasja to tworzenie niepowtarzalnych przestrzeni, gdzie komfort spotyka styl. Zajmujemy się malowaniem, układaniem podłóg, montażem okien i drzwi, oraz instalacją systemów grzewczych i wentylacyjnych. Niech Twoje wnętrza emanują harmonią i elegancją.</p>
            </div>
          </div>
        </div>
      </div>



    <div  class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Prace wykończeniowe</h3>
            @if (Auth::check() && Auth::user()->isAdmin())
            <a href="{{ route('finishingWorks.create') }}" class="btn btn-success">Dodaj</a>
            @endif
        </div>
        <div class="row">
            @foreach($finishingWorks as $fw)
            <div class="col-md-4">
                <div class="card">
                    @if ($fw->name === 'Montaż sufitów podwieszanych')
                    <div class="hot-badge">HOT!!!</div>
                    @endif
                    {{-- <div class="hot-badge">HOT!!!</div> --}}
                    {{-- <img src="{{ asset('img/finishingWorksimg/'.$fw->id.'.jpg') }}" alt="{{ $fw->name }} Image" class="card-img-top" alt="Fundamenty"> --}}
                    <img src="{{ asset($fw->image_path) }}" alt="{{ $fw->name }} Image"  class="card-img-top" alt="img">
                    <div class="card-body">
                        <h5 class="card-title">{{ $fw->name }}</h5>
                        <p class="card-text">{{ $fw->description }}</p>
                        <div class="d-grid gap-2 d-md-block">
                            @if (Auth::check())
                            <a href="{{ route('form') }}" class="btn btn-primary" role="button">Wybieram</a>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-primary" role="button">Wybieram</a>
                            @endif
                            <button href="#" class="btn btn-secondary" type="button" onclick="showServiceModal('{{ $fw->name }}', '{{ $fw->longdesc }}')">Czytaj dalej</button>
                            <div class="d-grid gap-2 d-md-block">
                                @if (Auth::check() && Auth::user()->isAdmin())
                                <a href="{{ route('finishingWorks.edit', $fw->id) }}" class="btn btn-warning">Edytuj</a>
                                <form method="POST" action="{{ route('finishingWorks.destroy', $fw->id) }}" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                </form>
                                {{-- <a href="{{ route('finishingWorks.create') }}" class="btn btn-success">Dodaj</a> --}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="service-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="service-modal-title"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p id="service-modal-description"></p>
            </div>
          </div>
        </div>
      </div>

      <div id="o-firmie" class="container mb-5">
        <h2 class="text-center mb-4">O naszej firmie</h2>
        <div class="row circle-text">
          <div class="col-md-6">
            <img src="img/firma.jpg" class="circle-image" alt="Obrazek Firmy">
          </div>
          <div class="col-md-6">
            <p class="lead text-info">Januszex - Polska firma budowlana z Podkarpacia</p>
            <p class="text-muted"> Działamy w branży budowlanej od ponad 20 lat, zdobywając zaufanie i uznanie naszych klientów. Jesteśmy dumni z licznych pozytywnych referencji oraz polecenia, które potwierdzają naszą jakość i profesjonalizm.</p>
            <p class="text-muted">Nasza firma skupia się na dostarczaniu kompleksowych usług budowlanych o najwyższym standardzie. Wykonujemy prace w kategoriach <a class="text-info link-with-underline" href="finishingWorks">Prace Wykończeniowe</a> oraz <a href="basicState" class="text-info link-with-underline">Stan Surowy</a>, spełniając oczekiwania naszych klientów w zakresie estetyki, funkcjonalności i terminowości.</p>
            <p class="text-muted">Zapraszamy do kontaktu i dołącz do grona zadowolonych klientów, którzy zaufali nam w realizacji swoich projektów budowlanych.</p>
          </div>
        </div>
        <div class="text-center mt-4">
          <p class="font-weight-bold">Skontaktuj się z nami:</p>
          <p>Adres: ul. Stelmacha 12, 26-200 Radom, PL</p>
          <p>Kontakt: tel. +91 123 123 2323, email: januszex@gmail.com</p>
        </div>
      </div>


      <script>
        // Funkcja wywoływana po kliknięciu przycisku "Czytaj dalej"
        function showServiceModal(title, description) {
          $('#service-modal-title').text(title);
          $('#service-modal-description').text(description);
          $('#service-modal').modal('show');
        }
      </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @include('shared.footer')
</body>
</html>
