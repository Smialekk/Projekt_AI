<!DOCTYPE html>
<html>
    @include('shared.head1')
<body>
    @include('shared.nav1')

    <div class="container mt-3">
        <h1>Utwórz klienta</h1>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            @endif

            <div class="form-group row">
                <label for="client_id" class="col-sm-2 col-form-label text-right">ID klienta:</label>
                <div class="col-sm-10">
                    <input type="text" name="client_id" id="client_id" value="{{ $order->client_id }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label text-right">Imię:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" value="{{ $order->name }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="surname" class="col-sm-2 col-form-label text-right">Nazwisko:</label>
                <div class="col-sm-10">
                    <input type="text" name="surname" id="surname" value="{{ $order->surname }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label text-right">Kategoria:</label>
                <div class="col-sm-10">
                    <input type="text" name="category" id="category" value="{{ $order->category }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="subcategory" class="col-sm-2 col-form-label text-right">Podkategoria:</label>
                <div class="col-sm-10">
                    <input type="text" name="subcategory" id="subcategory" value="{{ $order->subcategory }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label text-right">Data:</label>
                <div class="col-sm-10">
                    <input type="date" name="date" id="date" value="{{ $order->date }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="street" class="col-sm-2 col-form-label text-right">Ulica:</label>
                <div class="col-sm-10">
                    <input type="text" name="street" id="street" value="{{ $order->street }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="number" class="col-sm-2 col-form-label text-right">Numer:</label>
                <div class="col-sm-10">
                    <input type="text" name="number" id="number" value="{{ $order->number }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="city" class="col-sm-2 col-form-label text-right">Miasto:</label>
                <div class="col-sm-10">
                    <input type="text" name="city" id="city" value="{{ $order->city }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="region" class="col-sm-2 col-form-label text-right">Region:</label>
                <div class="col-sm-10">
                    <input type="text" name="region" id="region" value="{{ $order->region }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="postal_code" class="col-sm-2 col-form-label text-right">Kod pocztowy:</label>
                <div class="col-sm-10">
                    <input type="text" name="postal_code" id="postal_code" value="{{ $order->postal_code }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="country" class="col-sm-2 col-form-label text-right">Kraj:</label>
                <div class="col-sm-10">
                    <input type="text" name="country" id="country" value="{{ $order->country }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label text-right">Status:</label>
                <div class="col-sm-10">
                    <input type="text" name="status" id="status" value="{{ $order->status }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Zapisz</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
