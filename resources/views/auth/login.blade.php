<!doctype html>
<html lang="pl">

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
            @if (session('success'))
            <div class="alert alert-success text-center" role="alert">
                <strong>{{ session('success') }}</strong>
            </div>
            @endif
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Zaloguj się</h2>

              <form action="{{ route('login') }}" method="POST" action="{{ route('authenticate') }}" class="needs-validation" novalidate>
                @csrf

                <div class="form-outline mb-4">
                    <input type="email" id="form3Example3cg" class="form-control form-control-lg" value="{{ old('email') }}" id="email" name="email" placeholder="Email" />
                </div>

                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif

                <div class="form-outline mb-4">
                    <input type="password" id="form3Example4cg" class="form-control form-control-lg" id="password" name="password" placeholder="Hasło" />
                </div>

                @if ($errors->has('password'))
                    <div class="alert alert-danger">
                        {{ $errors->first('password') }}
                    </div>
                @endif

                <div class="d-flex justify-content-center">
                    <button type="submit" id="login-submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Zaloguj</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Zapomniałeś hasła? <a href="{{ route('login') }}" class="fw-bold text-body"><u>Resetuj hasło</u></a></p>
            </form>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('shared.footer')
</body>

</html>

