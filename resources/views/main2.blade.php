<!DOCTYPE html>
<html>
  @include('shared.head1')

  <body>
    @include('shared.nav')

    <div class="container">
      <div id="start" class="mb-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="img/logo2.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/mainPic4.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/mainPic3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
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
              <p class="card-text">Prace wykończeniowe to ostatni etap budowy, w którym nadajemy budynkowi ostateczny wygląd i funkcjonalność. Zajmują się one detalami, takimi jak malowanie ścian, układanie podłóg, montaż okien i drzwi, instalacja systemów grzewczych i wentylacyjnych, a także wykańczanie wnętrz. W tej kategorii znajdziesz usługi i produkty związane z estetyką, komfortem i funkcjonalnością wnętrz.</p>
              <a href="finishingWorks" class="btn btn-primary">Przejdź do kategorii</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card category-card">
            <img src="img/photo5.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Stan surowy</h5>
              <p class="card-text">Stan surowy to etap budowy, w którym konstrukcja budynku jest już ukończona, ale nie są jeszcze przeprowadzane prace wykończeniowe. Obejmuje on podstawowe elementy, takie jak fundamenty, ściany, stropy, dach, instalacje elektryczne i hydrauliczne. W tej kategorii znajdziesz informacje i usługi związane z budową i wykończeniem konstrukcji budynku.</p>
              <a href="basicState" class="btn btn-primary">Przejdź do kategorii</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="o-firmie" class="container mb-5">
      <h2>O firmie</h2>
      <p>Tutaj możesz umieścić informacje o Twojej firmie, jej historii, misji, zespole, itp.</p>
      <p>Adres: ul. Przykładowa 123, 00-000 Warszawa</p>
      <p>Kontakt: tel. 123-456-789, email: kontakt@twojafirma.pl</p>
    </div>

    <!-- Poniżej dołączane są skrypty Bootstrap JavaScript (jeśli są potrzebne) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
  </body>
</html>
