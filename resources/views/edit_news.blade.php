<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/png" href="logo1.png">
    <title>Edit News</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1><i class="material-icons text-danger bg-primary rounded me-2" style="font-size: 36px; color: white !important"></i>Edit News</h1>
        </div>
        <hr style="background-color: #FF6900 !important;">

        <form action="{{ route('noticias.update', $noticia->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <div class="col-6">
                    <label class="mb-2" for="titulo">Title:</label>
                    <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $noticia->titulo) }}" required>
                </div>

                <div class="col-6">
                    <label class="mb-2" for="tipo">Type:</label>
                    <input type="text" name="tipo" class="form-control" value="{{ old('tipo', $noticia->tipo) }}" required>
                </div>
            </div>

            <div class="form-group row mt-3">
                <div class="col-12">
                    <label class="mb-2" for="descricao">Description:</label>
                    <textarea name="descricao" class="form-control" rows="4" required>{{ old('descricao', $noticia->descricao) }}</textarea>
                </div>
            </div>

            <div class="form-group row mt-3">
                <div class="col-12">
                    <label class="mb-2" for="link">Link:</label>
                    <input type="url" name="link" class="form-control" value="{{ old('link', $noticia->link) }}" required>
                </div>
            </div>

            <hr style="background-color: #cc0000 !important;">
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <button type="submit" class="btn btn-success w-100" style="background-color: #cc0000 !important; border: none !important;">Update</button>
                </div>
            </div>
        </form>

    </div>
</body>

</html>