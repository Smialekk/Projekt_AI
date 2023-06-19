<!DOCTYPE html>
<html>
    @include('shared.head1')
<body>
    @include('shared.nav1')

    <div class="container mt-3">
        <h1>Utwórz usługę do Stanu Surowego</h1>
        <form action="{{ route('basicState.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Opis:</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="image">Zdjęcie:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="longdesc">Długi opis:</label>
                <textarea name="longdesc" id="longdesc" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Dodaj</button>
            </div>
        </form>

    </div>
</body>
</html>
