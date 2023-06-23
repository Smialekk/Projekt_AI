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
            <h1>Lista pracowników</h1>
            <h3>kod: KOD_PRACOWNICZY</h3>
            <a href="{{ route('register') }}" class="btn btn-primary">Dodaj pracownika</a>
        </div>

        <div class="table-responsive">
        <table class="table table-responsive table-striped ">
            <thead>
                <tr>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Profesja</th>
                    <th>Umiejętności</th>
                    <th>Grafik</th>
                    <th>Pensja</th>
                    {{-- <th>Rola</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $e)
                    <tr>
                        <td>{{ $e->name }}</td>
                        <td>{{ $e->surename }}</td>
                        <td>{{ $e->email }}</td>
                        <td>{{ $e->phone }}</td>
                        <td>{{ $e->profession }}</td>
                        <td>{{ $e->skills }}</td>
                        <td>{{ $e->schedule }}</td>
                        <td>{{ $e->salary }}</td>
                        {{-- <td>{{ $e->is_admin }}</td> --}}
                        <td>
                            <a href="{{ route('employees.edit', $e->id) }}" class="btn btn-primary">Edytuj</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('employees.destroy', $e->id) }}" style="display: inline-block">
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
    </div>

    <script>
        // Funkcja automatycznie chowająca wiadomość po 3 sekundach
        setTimeout(function() {
            document.getElementById('alert-success').style.display = 'none';
        }, 5000);
    </script>

</body>
</html>
