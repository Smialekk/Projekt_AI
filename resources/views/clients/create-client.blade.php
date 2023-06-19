<!DOCTYPE html>
<html>
    @include('shared.head1')
<body>
    @include('shared.nav1')

    <div class="container mt-3">
        <h1>Utwórz użytkownika/pracownika</h1>
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label text-end">Imię:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" value="{{ $employee->name }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="surename" class="col-sm-2 col-form-label text-end">Nazwisko:</label>
                <div class="col-sm-10">
                    <input type="text" name="surename" id="surename" value="{{ $employee->surename }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label text-end">Email:</label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="email" value="{{ $employee->email }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label text-end">Telefon:</label>
                <div class="col-sm-10">
                    <input type="text" name="phone" id="phone" value="{{ $employee->phone }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="profession" class="col-sm-2 col-form-label text-end">Profesja:</label>
                <div class="col-sm-10">
                    <input type="text" name="profession" id="profession" value="{{ $employee->profession }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="skills" class="col-sm-2 col-form-label text-end">Umiejętności:</label>
                <div class="col-sm-10">
                    <input type="text" name="skills" id="skills" value="{{ $employee->skills }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="schedule" class="col-sm-2 col-form-label text-end">Grafik:</label>
                <div class="col-sm-10">
                    <input type="text" name="schedule" id="schedule" value="{{ $employee->schedule }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="salary" class="col-sm-2 col-form-label text-end">Pensja:</label>
                <div class="col-sm-10">
                    <input type="text" name="salary" id="salary" value="{{ $employee->salary }}" class="form-control">
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
