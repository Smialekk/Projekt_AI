<!DOCTYPE html>
<html>
@include('shared.head1')
<body>
@include('shared.nav1')

<div class="container">
    @if(session('success'))
    <div class="alert alert-success" id="alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <h1>Wiadomości od klientów</h1>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Imię</th>
            <th>Email</th>
            <th>Wiadomość</th>
        </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{ $message->id }}</td>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->message }}</td>
                <td>
                    <form method="POST" action="{{ route('messages.delete', $message->id) }}" style="display: inline-block">
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
