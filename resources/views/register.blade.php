<!DOCTYPE html>
<html>
@include('shared.head1')

<body>
@include('shared.nav1')

<section class="vh-100 bg-image"
  style="background-image: url(/img/backpic.jpg);">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Rejestracja</h2>

              @if(Auth::check() && Auth::guard()->user()->isAdmin())
              <h3 class="text-uppercase text-center mb-5">Utwórz użytkownika/pracownika</h3>
              @endif

              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

              <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="form-outline mb-4">
                  <input type="text" class="form-control form-control-lg" id="name" name="name" required placeholder="Imię"/>
                </div>

                <div class="form-outline mb-4">
                    <input type="text" class="form-control form-control-lg" id="surname" name="surname" required placeholder="Nazwisko"/>
                  </div>

                <div class="form-outline mb-4">
                  <input type="email" class="form-control form-control-lg"  id="email" name="email" placeholder="Email"/>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" " class="form-control form-control-lg" id="password" name="password" placeholder="Hasło" />
                </div>

                <div class="form-outline mb-4">
                    <input type="phone"  class="form-control form-control-lg" id="phone" name="phone" placeholder="Telefon" />
                  </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_employee" id="is_employee">
                        <label class="form-check-label" for="is_employee">
                            Jestem pracownikiem
                        </label>
                    </div>
                </div>

                        <!-- Pole tekstowe dla kodu pracowniczego -->
                        <div id="employee-code-section" style="display: none;">
                            <div id="code-error" style="display: none;"></div>
                            <label for="employee_code">Kod pracowniczy:</label>
                            <input type="text" id="employee_code" name="employee_code">
                            <!-- Przycisk zatwierdzający kod pracowniczy -->
                            <button type="button" id="code-submit" class="btn btn-primary">Zatwierdź</button>
                            <br><br>
                        </div>


                <div class="form-check d-flex justify-content-center mb-5">

                  <label class="form-check-label" for="check-term">
                    <input class="form-check-input me-2" type="checkbox" value="" id="check-term" />
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                  <div id="privacy-error" style="color: red; display: none;">Proszę potwierdzić politykę prywatności</div>

                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" id="register-submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Zarejestruj</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{ route('login') }}"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script>

    document.getElementById('register-submit').addEventListener('click', function(event) {
        var termsCheckbox = document.getElementById('check-term');
        var privacyError = document.getElementById('privacy-error');

        if (!termsCheckbox.checked) {
        privacyError.textContent = 'Proszę potwierdzić politykę prywatności'; // Ustaw tekst komunikatu na "Proszę potwierdzić politykę prywatności"
        privacyError.style.color = 'red'; // Ustaw kolor komunikatu na czerwony
        privacyError.style.display = 'block'; // Wyświetl komunikat

        // Przerwij wysyłanie formularza
        event.preventDefault();
        }
    });

    // Nasłuchuj zdarzenia zmiany stanu checkboxa
    document.getElementById('is_employee').addEventListener('change', function() {
        var employeeCodeSection = document.getElementById('employee-code-section');

        // Sprawdź stan checkboxa
        if (this.checked) {
            employeeCodeSection.style.display = 'block'; // Wyświetl pole z kodem pracowniczym
        } else {
            employeeCodeSection.style.display = 'none'; // Ukryj pole z kodem pracowniczym
        }
    });

    // Nasłuchuj zdarzenia kliknięcia przycisku zatwierdzającego kod pracowniczy
    document.getElementById('code-submit').addEventListener('click', function() {
        var isEmployeeChecked = document.getElementById('is_employee').checked;
        var employeeCode = document.getElementById('employee_code').value;
        var codeError = document.getElementById('code-error');
        var termsCheckbox = document.getElementById('check-term');
        var privacyError = document.getElementById('privacy-error');

        if (!termsCheckbox.checked) {
        privacyError.textContent = 'Proszę potwierdzić politykę prywatności'; // Ustaw tekst komunikatu na "Proszę potwierdzić politykę prywatności"
        privacyError.style.color = 'red'; // Ustaw kolor komunikatu na czerwony
        privacyError.style.display = 'block'; // Wyświetl komunikat

        // Przerwij działanie funkcji
        return;
    }


        if (isEmployeeChecked && employeeCode === '') {
        codeError.textContent = 'Wprowadź kod pracowniczy'; // Ustaw tekst komunikatu na "Wprowadź kod pracowniczy"
        codeError.style.color = 'red'; // Ustaw kolor komunikatu na czerwony
        codeError.style.display = 'block'; // Wyświetl komunikat
        return;
    }

        // Sprawdź kod pracowniczy
        if (employeeCode === 'KOD_PRACOWNICZY') {
            codeError.textContent = 'Poprawny kod'; // Ustaw tekst komunikatu na "Poprawny kod"
            codeError.style.color = 'green'; // Ustaw kolor komunikatu na zielony
        } else {
            codeError.textContent = 'Nieprawidłowy kod'; // Ustaw tekst komunikatu na "Zły kod"
            codeError.style.color = 'red'; // Ustaw kolor komunikatu na czerwony
        }

        // Wyświetl komunikat
        codeError.style.display = 'block';
    });


    // Nasłuchuj zdarzenia kliknięcia przycisku zatwierdzającego kod pracowniczy
    document.getElementById('code-submit').addEventListener('click', function() {
        var employeeCode = document.getElementById('employee-code').value;
        if (employeeCode === 'KOD_PRACOWNICZY') {
            // Pokaż pola profession i skills
            document.getElementById('additional-fields').style.display = 'block';
            // Ukryj błąd
            document.getElementById('code-error').style.display = 'none';
        } else {
            // Ukryj pola profession i skills
            document.getElementById('additional-fields').style.display = 'none';
            // Wyświetl błąd
            document.getElementById('code-error').style.display = 'block';
        }
    });
</script>

@include('shared.footer')
</body>
</html>
