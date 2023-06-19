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
            <h1>Lista użytkowników</h1>
            <a href="{{ route('register') }}" class="btn btn-primary">Dodaj klienta</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Czy pracownik</th>
                    <th>Preferencje klienta</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $c)
                    <tr>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->surename }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->phone }}</td>
                        <td>{{ $c->is_employee }}</td>
                        <td>{{ $c->preferences }}</td>
                        <td>
                            <a href="{{ route('clients.edit', $c->id) }}" class="btn btn-primary">Edytuj</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('clients.destroy', $c->id) }}" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Funkcja automatycznie chowająca wiadomość po 3 sekundach
        setTimeout(function() {
            document.getElementById('alert-success').style.display = 'none';
        }, 5000);
    </script>

</body>
</html>
