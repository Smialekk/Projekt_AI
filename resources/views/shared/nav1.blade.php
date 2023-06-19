

<div class="row align-items-center text-center" style="margin-top: -40px;">
    <div class="col">
      <div class="topbarElements d-inline-flex align-items-center" title="Stelmacha 12, Radom, PL">
        <div>&#x27A4;</div>
        <div class="text-start d-md-block d-none">
          <h5 class="p-0 m-0 text-uppercase">Biuro</h5>
          <p class="p-0 m-0 text-secondary">Stelmacha 12, Radom, PL</p>
        </div>
      </div>
    </div>
    <div class="col border-start border-end">
      <div class="topbarElements d-inline-flex align-items-center" title="januszex@gmail.com">
        <div>&#x270E;</div>
        <div class="text-start d-md-block d-none">
          <h5 class="p-0 m-0 text-uppercase">Email</h5>
          <p class="p-0 m-0 text-secondary">januszex@gmail.com</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="topbarElements d-inline-flex align-items-center" title="+91 123 123 2323">
        <div>
          &#x260F;
        </div>
        <div class="text-start d-md-block d-none">
          <h5 class="p-0 m-0 text-uppercase">Telefon</h5>
          <p class="p-0 m-0 text-secondary">+91 123 123 2323</p>
        </div>
      </div>
    </div>
  </div>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="{{ route('main') }}">
        <img src="{{ asset('img/logo2.jpg') }}" alt="Logo">
        JANUSZEX Co.
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
                @if (Auth::check())

                  @if(Auth::guard()->user()->isAdmin())<!-- Sprawdzenie, czy użytkownik jest administratorem -->
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('clients') }}">Klienci</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('employees') }}">Pracownicy</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders') }}">Zamówienia</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('messages') }}">Wiadomości</a>
                  </li>
                  @endif
                  @if (Auth::guard()->user()->isEmployee())
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('builderPanel') }}">MyBudowlaniec</a>
                  </li>
                  @endif

                  @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Logowanie</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">Rejestracja</a>
                  </li>

                @endif
            @if (Auth::check())
            @if(Auth::guard()->user()->isAdmin() == false && Auth::guard()->user()->isEmployee() == false)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('form') }}">Złóż zamówienie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('orders') }}">Twoje zamównienia</a>
              </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" href="{{ route('main') }}#o-firmie" data-scroll="#o-firmie">O firmie</a>
              </li>
            <li class="nav-item">
                <a class="nav-link">Zalogowany: {{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Wyloguj</a>
              </li>

            @endif
        </ul>
    </div>
</nav>


<script>
    // Przechwytywanie elementów HTML
    const topbar = document.getElementById('topbar');
    const navbar = document.getElementById('navbar');
    const navbarHeight = navbar.offsetHeight;

    // Obsługa zdarzenia przewijania strony
    window.addEventListener('scroll', function() {
      // Sprawdzanie pozycji przewijania
      const scrollPosition = window.scrollY || window.pageYOffset;

      // Dodawanie / usuwanie klasy 'sticky' w zależności od pozycji przewijania
      if (scrollPosition > navbarHeight) {
        topbar.classList.remove('d-none');
      } else {
        topbar.classList.add('d-none');
      }
    });
  </script>

<script>
    // Nasłuchuj kliknięć na linkach nawigacyjnych
    document.addEventListener('click', function(event) {
      // Sprawdź, czy kliknięcie było na linku z atrybutem data-scroll
      var link = event.target.closest('[data-scroll]');
      if (link) {
        // Znajdź sekcję docelową na podstawie identyfikatora
        var targetId = link.getAttribute('data-scroll');
        var target = document.querySelector(targetId);
        if (target) {
          // Przewiń stronę do sekcji
          event.preventDefault();
          target.scrollIntoView({ behavior: 'smooth' });
        }
      }
    });
  </script>

