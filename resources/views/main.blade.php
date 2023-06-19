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
          <div class="col-md-5">
            <img src="img/logo2.jpg" class="img-fluid" alt="Obrazek">
          </div>
            <div class="col-md-7">
            <div class="text-center">
                <h2 class="mb-4 text-primary font-weight-bold">Januszex - Twoja droga do doskonałości budowlanej!</h2>
                <p class="lead">Oferujemy kompleksowe usługi w dwóch głównych kategoriach: <a class="text-info link-with-underline" href="finishingWorks">Prace Wykończeniowe</a> oraz <a href="basicState" class="text-info link-with-underline">Stan Surowy</a>. Jesteśmy ekspertami w branży budowlanej i gwarantujemy profesjonalizm na każdym etapie projektu.</p>

                <p class="lead">Dołącz do naszej rodziny zadowolonych klientów i odkryj, jak Januszex może przekształcić Twoje marzenia w rzeczywistość. Skontaktuj się z nami już dziś i rozpocznij swoją budowlaną przygodę!</p>
              </div>

              {{-- <div class="text-center">
                @if(Auth::check() && Auth::guard()->user()->isAdmin())
                  <form action="/save-edits" method="POST">
                    @csrf
                    <input type="hidden" name="save" value="1">
                    <textarea name="text" rows="4">{{ $text }}</textarea>
                    <textarea name="description" rows="4">{{ $description }}</textarea>
                    <button type="submit">Zapisz</button>
                  </form>
                @else
                  <h2 class="mb-4 text-primary font-weight-bold">{{ $text }}</h2>
                  <p class="lead">{{ $description }}</p>
                @endif
              </div> --}}


            </div>

          </div>

        </div>
      </div>

    <div id="category" class="container mb-5">
      <div class="row">
        <div class="col-md-6">
          <div class="card category-card">
            <img src="img/mainPic1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Prace wykończeniowe</h5>
              <p class="card-text">Prace Wykończeniowe to nasza pasja! Zajmujemy się malowaniem, układaniem podłóg, montażem okien i drzwi, oraz instalacją systemów grzewczych i wentylacyjnych. Stworzymy dla Ciebie wnętrza, które zachwycą zarówno estetyką, jak i funkcjonalnością.</p>
              <a href="finishingWorks" class="btn btn-primary">Przejdź do kategorii</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card category-card">
            <img src="img/photo5.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Stan surowy</h5>
              <p class="card-text">Stan Surowy to fundament naszych umiejętności! Realizujemy prace budowlane, wznosząc solide konstrukcje, przygotowując fundamenty, stawiając ściany i dach. Tworzymy solidne podstawy, które będą trwałe i bezpieczne.</p>
              <a href="basicState" class="btn btn-primary">Przejdź do kategorii</a>
            </div>
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
          @if(Auth::check())
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Zadaj Pytanie
          </button>
            @if(session('success'))
            <div class="alert alert-success" id="alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
        @else
          <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('login') }}'">
              Zadaj Pytanie
          </button>
      @endif

        </div>
      </div>

      <!-- Button to trigger the modal -->


  <!-- Modal -->
  @if(Auth::check())
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Wiadomość wysyłana bezpośrednio do nas!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('sendMessage') }}" method="POST">
            @csrf
            <!-- Name input -->
            <div class="form-outline mb-4">
              <input type="text" id="form4Example1" class="form-control" name="name" placeholder="{{ Auth::user()->name }} "/>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form4Example2" class="form-control" name="email" placeholder="{{ Auth::user()->email }}"/>
            </div>

            <!-- Message input -->
            <div class="form-outline mb-4">
              <textarea class="form-control" id="form4Example3" rows="4" name="message" placeholder="Masz pytanie? Zadaj je tutaj! "></textarea>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Wyślij</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endif


    <!-- Poniżej dołączane są skrypty Bootstrap JavaScript (jeśli są potrzebne) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

    <style>
        .carousel-item img {
          max-height: 600px; /* Zmniejsz maksymalną wysokość obrazu w karuzeli */
          /* object-fit: cover; Dopasuj obraz do wymiarów karuzeli */
        }
      </style>

    @include('shared.footer')
  </body>
</html>
