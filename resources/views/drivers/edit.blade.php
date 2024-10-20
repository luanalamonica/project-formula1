<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Piloto</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Editar Piloto</h1>
        <form action="{{ route('piloto.update', $driver->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome do Piloto</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome', $driver->nome) }}" required>
            </div>
            <div class="form-group">
                <label for="posicao">Posição</label>
                <input type="text" name="posicao" class="form-control" value="{{ old('posicao', $driver->posicao) }}" required>
            </div>
            <div class="form-group">
                <label for="pontuacao">Pontuação</label>
                <input type="number" name="pontuacao" class="form-control" value="{{ old('pontuacao', $driver->pontuacao) }}" required>
            </div>
            <button type="submit" class="btn btn-success">Atualizar</button>
        </form>
    </div>
</body>
</html>
