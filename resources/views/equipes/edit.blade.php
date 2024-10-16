@extends('layouts.app')

@section('content')
    <h1>Editar Equipe</h1>

    <form action="{{ route('equipes.update', $equipe->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome da Equipe:</label>
            <input type="text" name="nome" class="form-control" value="{{ $equipe->nome }}" required>
        </div>

        <div class="form-group">
            <label for="pontuacao">Pontuação:</label>
            <input type="number" name="pontuacao" class="form-control" value="{{ $equipe->pontuacao }}" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection
