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
        <h1>Panel pracownika</h1>
        <h4>Witaj {{ Auth::user()->name }} tutaj możesz edytować swoje atrybuty!</h4>
        <form action="{{ route('builderPanel.update', $employee->id) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="profession">Profesja</label>
                <select class="form-control" id="profession" name="profession">
                    <option value="murarz" {{ $employee->profession === 'murarz' ? 'selected' : '' }}>murarz</option>
                    <option value="tynkarz" {{ $employee->profession === 'tynkarz' ? 'selected' : '' }}>tynkarz</option>
                    <option value="akrobata" {{ $employee->profession === 'akrobata' ? 'selected' : '' }}>akrobata</option>
                    <option value="pomocnik" {{ $employee->profession === 'pomocnik' ? 'selected' : '' }}>pomocnik</option>
                    <option value="operator" {{ $employee->profession === 'operator' ? 'selected' : '' }}>operator</option>
                    <option value="malarz" {{ $employee->profession === 'malarz' ? 'selected' : '' }}>malarz</option>
                    <option value="monter" {{ $employee->profession === 'monter' ? 'selected' : '' }}>monter</option>
                    <option value="elektryk" {{ $employee->profession === 'elektryk' ? 'selected' : '' }}>elektryk</option>
                    <option value="glazurnik" {{ $employee->profession === 'glazurnik' ? 'selected' : '' }}>glazurnik</option>
                    <option value="full-stack" {{ $employee->profession === 'full-stack' ? 'selected' : '' }}>full-stack</option>
                </select>
            </div>
            <div class="form-group">
                <label for="skills">Umiejętności</label>
                <input class="form-control" id="skills" name="skills" rows="4" value="{{ $employee->skills }}">
                {{-- <select class="form-control" id="skills" name="skills">
                    <option value="pon - pt, 07:00-17:00" {{ $employee->skills === 'pon - pt, 07:00-17:00' ? 'selected' : '' }}>pon - pt, 07:00-17:00</option>
                    <option value="pon - sob, 05:00-13:00" {{ $employee->skills === 'pon - sob, 05:00-13:00' ? 'selected' : '' }}>pon - sob, 05:00-13:00</option>
                    <option value="pon - sob, 14:00-20:00" {{ $employee->skills === 'pon - sob, 14:00-20:00' ? 'selected' : '' }}>pon - sob, 14:00-20:00</option>
                </select> --}}
            </div>
            <div class="form-group">
                <label for="graphic">Grafik</label>
                <select class="form-control" id="graphic" name="schedule">
                    <option value="pon - pt, 07:00-17:00" {{ $employee->schedule === 'pon - pt, 07:00-17:00' ? 'selected' : '' }}>pon - pt, 07:00-17:00</option>
                    <option value="pon - sob, 05:00-13:00" {{ $employee->schedule === 'pon - sob, 05:00-13:00' ? 'selected' : '' }}>pon - sob, 05:00-13:00</option>
                    <option value="pon - sob, 14:00-20:00" {{ $employee->schedule === 'pon - sob, 14:00-20:00' ? 'selected' : '' }}>pon - sob, 14:00-20:00</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </form>
    </div>

    <script>
        // Funkcja automatycznie chowająca wiadomość po 3 sekundach
        setTimeout(function() {
            document.getElementById('alert-success').style.display = 'none';
        }, 5000);
    </script>

</body>
</html>
