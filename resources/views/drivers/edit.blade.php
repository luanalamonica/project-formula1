<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit driver</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Driver</h1>
        <form action="{{ route('piloto.update', $driver->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Name</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome', $driver->nome) }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="posicao">Position</label>
                <input type="text" name="posicao" class="form-control" value="{{ old('posicao', $driver->posicao) }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="pontuacao">Score</label>
                <input type="number" name="pontuacao" class="form-control" value="{{ old('pontuacao', $driver->pontuacao) }}" required>
            </div>
            <br>
            <button type="submit" class="btn btn-success">to update</button>
        </form>
    </div>
</body>
</html>
