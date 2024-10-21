<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit news</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit News</h1>
        <form action="{{ route('noticias.update', $noticia->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titulo">Title</label>
                <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $noticia->titulo) }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="tipo">Type</label>
                <input type="text" name="tipo" class="form-control" value="{{ old('tipo', $noticia->tipo) }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="descricao">Description</label>
                <textarea name="descricao" class="form-control" required>{{ old('descricao', $noticia->descricao) }}</textarea>
            </div>
            <br>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="url" name="link" class="form-control" value="{{ old('link', $noticia->link) }}" required>
            </div>
            <br>
            <button type="submit" class="btn btn-success">to update</button>
            <br>
        </form>
    </div>
</body>
</html>
