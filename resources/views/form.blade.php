<!DOCTYPE html>
<html>
@include('shared.head1')

<body>
    @include('shared.nav1')


            <section class="vh-100 bg-image"
  style="background-image: url(/img/backpic.jpg); background-repeat: repeat;">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">

    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100 form-container">

                <div class="card" style="border-radius: 15px;">

                    @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <section class="order-form m-4" >
                <form action="{{ route('form') }}" method="POST">
                {!! Session::get("msg", '') !!}

                @csrf
                <div class="container pt-4">
                    <div class="row">
                        <div class="col-12 px-4">
                            <h1>Formularz zamówienia</h1>
                            <span>Proszę zapoznać się z treścią formularza, oraz wypełnić wszystkie pola</span>
                            <hr class="mt-1" />
                        </div>

                        <div class="col-12">
                            <div class="row mx-4">
                                <div class="col-12">
                                    <label class="order-form-label">Godność</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-outline">
                                        <input type="text" id="name" name="name" class="form-control order-form-input" required />
                                        <label class="form-label" for="name">Imię</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <div class="form-outline">
                                        <input type="text" id="surname" name="surname" class="form-control order-form-input" required/>
                                        <label class="form-label" for="form2">Nazwisko</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 mx-4">
                                <div class="col-12">
                                    <label class="order-form-label">Kategoria</label>
                                </div>

                                <div class="col-12">
                                    <select class="form-select" id="category" name="category" required>
                                        <option value="" selected>Wybierz kategorię</option>
                                        <option value="basic_state" {{ $category == 'basic_state' ? 'selected' : '' }} >Stan surowy</option>
                                        <option value="finish" {{ $category == 'finish' ? 'selected' : '' }} >Prace wykończeniowe</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3 mx-4">
                                <div class="col-12">
                                    <label class="order-form-label">Podkategoria</label>
                                </div>
                                <div class="col-12">
                                    <select class="form-select" id="subcategory" name="subcategory" required>
                                        <option value="" selected>Wybierz podkategorię</option>
                                        @if ($category == 'basic_state')
                                        @foreach ($basicState as $bs)
                                            <option> {{ $bs->name }}</option>
                                        @endforeach
                                    @elseif ($category == 'finish')
                                        @foreach ($finishingWorks as $fw)
                                            <option>{{ $fw->name }}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3 mx-4">
                                <div class="col-12">
                                    <label class="order-form-label" for="date-picker-example">Data</label>
                                     <input type="date" name="date" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <div class="form-outline datepicker" data-mdb-toggle-button="false">
                                        {{-- <input
                                        type="text" class="form-control order-form-input" id="datepicker1" data-mdb-toggle="datepicker" /> --}}
                                        <label for="datepicker1" class="form-label">Orientacyjna data do uzgodnienia</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 mx-4">
                                <div class="col-12">
                                    <label class="order-form-label">Adres</label>
                                </div>
                                <div class="col-12">
                                    <div class="form-outline">
                                        <input type="text" id="street" name="street" class="form-control order-form-input" />
                                        <label class="form-label" for="form5">Ulica</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="form-outline">
                                        <input type="text" id="number" name="number" class="form-control order-form-input" />
                                        <label class="form-label" for="form6">Numer</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-2 pe-sm-2">
                                    <div class="form-outline">
                                        <input type="text" id="city" name="city" class="form-control order-form-input" />
                                        <label class="form-label" for="form7">Miasto</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-2 ps-sm-0">
                                    <div class="form-outline">
                                        <input type="text" id="region" name="region" class="form-control order-form-input" />
                                        <label class="form-label" for="form8">Region</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-2 pe-sm-2">
                                    <div class="form-outline">
                                        <input type="text" id="postal_code" name="postal_code" class="form-control order-form-input" />
                                        <label class="form-label" for="form9">Kod pocztowy</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-2 ps-sm-0">
                                    <div class="form-outline">
                                        <input type="text" id="country" name="country" class="form-control order-form-input" />
                                        <label class="form-label" for="form10">Kraj</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 mx-4">
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">Wiem co kupuje</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="submit" id="btnSubmit" class="btn btn-primary d-block mx-auto btn-submit">Zamawiam</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
              </section>
                </div>

        </div>
    </div>
  </div>
            </section>
            @include('shared.footer')

            <script>
                // Pobierz elementy formularza
                const categorySelect = document.getElementById('category');
                const subcategorySelect = document.getElementById('subcategory');
                // Definiuj opcje podkategorii dla każdej kategorii
                const subcategoryOptions = {
                    basic_state: [
                        @foreach ($basicState as $bs)
                            { value: '{{ $bs->id }}', label: '{{ $bs->name }}' },
                        @endforeach
                    ],
                    finish: [
                        @foreach ($finishingWorks as $fw)
                            { value: '{{ $fw->id }}', label: '{{ $fw->name }}' },
                        @endforeach
                    ],
                };
                // Funkcja aktualizująca opcje w polu wyboru podkategorii
                function updateSubcategoryOptions() {
                    const selectedCategory = categorySelect.value;
                    const options = subcategoryOptions[selectedCategory] || [];
                    // Usuń wszystkie opcje
                    subcategorySelect.innerHTML = '';
                    // Dodaj nowe opcje
                    options.forEach((option) => {
                        const { value, label } = option;
                        const optionElement = document.createElement('option');
                        optionElement.value = value;
                        optionElement.text = label;
                        subcategorySelect.appendChild(optionElement);
                    });
                }
                // Nasłuchuj zdarzenia zmiany wybranej kategorii
                categorySelect.addEventListener('change', updateSubcategoryOptions);

                // Wywołaj funkcję aktualizującą opcje na starcie
                updateSubcategoryOptions();
            </script>

            </body>
</html>
