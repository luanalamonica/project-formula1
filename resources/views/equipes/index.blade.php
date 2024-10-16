<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/scores.css') }}">
    <title>Equipes</title>
</head>
<body>
    <h1>Listagem de Equipes</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Pontuação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipes as $equipe)
            <tr>
                <td>{{ $equipe->id }}</td>
                <td>{{ $equipe->nome }}</td>
                <td>{{ $equipe->pontuacao }}</td>
                <td>
                    <a href="{{ route('equipes.edit', $equipe->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('equipes.destroy', $equipe->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
