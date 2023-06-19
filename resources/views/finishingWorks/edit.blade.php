<!DOCTYPE html>
<html>
    @include('shared.head1')
<body>
    @include('shared.nav1')

    <div class="container mt-3">
        <h1>Edytuj usługe z prac wykończeniowych</h1>
        <form action="{{ route('finishingWorks.update', $finishingWorks->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label text-right">Nazwa:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" value="{{ $finishingWorks->name }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label text-right">Opis:</label>
                <div class="col-sm-10">
                    <input name="description" id="description" value="{{ $finishingWorks->description }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="image_path" class="col-sm-2 col-form-label text-right">Ścieżka obrazu:</label>
                <div class="col-sm-10">
                    <input type="text" name="image_path" id="image_path" value="{{ $finishingWorks->image_path }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="longdesc" class="col-sm-2 col-form-label text-right">Długi opis:</label>
                <div class="col-sm-10">
                    <input name="longdesc" id="longdesc" value="{{ $finishingWorks->longdesc }}" class="form-control">
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
