<!DOCTYPE html>
<html>
    @include('shared.head1')
<body>
    @include('shared.nav1')

    <div class="container mt-3">
        <h1>Edytuj klienta</h1>
        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label text-right">Imię:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" value="{{ $client->name }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="surename" class="col-sm-2 col-form-label text-right">Nazwisko:</label>
                <div class="col-sm-10">
                    <input type="text" name="surename" id="surename" value="{{ $client->surename }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label text-right">Email:</label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="email" value="{{ $client->email }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label text-right">Telefon:</label>
                <div class="col-sm-10">
                    <input type="text" name="phone" id="phone" value="{{ $client->phone }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="preferences" class="col-sm-2 col-form-label text-right">Preferencje:</label>
                <div class="col-sm-10">
                    <input type="text" name="preferences" id="preferences" value="{{ $client->preferences }}" class="form-control">
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
