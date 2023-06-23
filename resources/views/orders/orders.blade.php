<!DOCTYPE html>
<html>
    @include('shared.head1')
<body>
    @include('shared.nav1')

    <div class="container mt-3">

        @if(session('success'))
        <div class="alert alert-success" id="alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <div class="d-flex justify-content-between align-items-center">
            <h1>Lista zamównień</h1>
            @if (Auth::guard()->user()->isAdmin())
            <a href="{{ route('orders.create-order') }}" class="btn btn-primary">Utwórz zamówienie</a>
            @endif
        </div>
        <div class="table-responsive">
            <table class="table table-responsive table-striped ">
            <thead>
                <tr>
                    <th>client_id</th>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Kategoria</th>
                    <th>podkategoria</th>
                    <th>data</th>
                    <th>ulica</th>
                    <th>numer</th>
                    <th>miasto</th>
                    <th>region</th>
                    <th>kod pocztowy</th>
                    <th>kraj</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $o)
                @if (Auth::check() && Auth::user()->isAdmin())
                    <tr>
                        <td>{{ $o->client_id }}</td>
                        <td>{{ $o->name }}</td>
                        <td>{{ $o->surname }}</td>
                        <td>{{ $o->category }}</td>
                        <td>{{ $o->subcategory }}</td>
                        <td>{{ $o->date }}</td>
                        <td>{{ $o->street }}</td>
                        <td>{{ $o->number }}</td>
                        <td>{{ $o->city }}</td>
                        <td>{{ $o->region }}</td>
                        <td>{{ $o->postal_code }}</td>
                        <td>{{ $o->country }}</td>
                        <td>{{ $o->status }}</td>
                        <td>
                            <a href="{{ route('orders.edit', $o->id) }}" class="btn btn-primary">Edytuj</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('orders.destroy', $o->id) }}" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </form>
                        </td>
                    </tr>
                    @elseif (Auth::check() && $o->client_id == Auth::id())
                    <tr>
                        <td>{{ $o->client_id }}</td>
                        <td>{{ $o->name }}</td>
                        <td>{{ $o->surname }}</td>
                        <td>{{ $o->category }}</td>
                        <td>{{ $o->subcategory }}</td>
                        <td>{{ $o->date }}</td>
                        <td>{{ $o->street }}</td>
                        <td>{{ $o->number }}</td>
                        <td>{{ $o->city }}</td>
                        <td>{{ $o->region }}</td>
                        <td>{{ $o->postal_code }}</td>
                        <td>{{ $o->country }}</td>
                        <td> <span style="color: darkgreen; background-color: lightgreen; padding: 4px; font-weight: bold;">{{ $o->status }} </span></td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

    <script>
        // Funkcja automatycznie chowająca wiadomość po 3 sekundach
        setTimeout(function() {
            document.getElementById('alert-success').style.display = 'none';
        }, 5000);
    </script>

</body>
</html>
