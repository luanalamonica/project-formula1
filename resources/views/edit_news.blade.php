<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Notícia</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Editar Notícia</h1>
        <form action="{{ route('noticias.update', $noticia->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $noticia->titulo) }}" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <input type="text" name="tipo" class="form-control" value="{{ old('tipo', $noticia->tipo) }}" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" class="form-control" required>{{ old('descricao', $noticia->descricao) }}</textarea>
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="url" name="link" class="form-control" value="{{ old('link', $noticia->link) }}" required>
            </div>
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="{{ route('news') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
