<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;

class TeamController extends Controller
{
     /**
     * Armazena o conteúdo no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvarEquipe(Request $request)
    {
        // dd($request);
        // Validação dos dados recebidos
        $request->validate([
            'temporada' => 'required|string|max:255',
            'nome' => 'required|string|max:50',
            'posicao' => 'required|string',
            'pontuacao' => 'required|string',
        ]);

        // Cria um novo registro no banco de dados
        $content = Equipe::create([
            'temporada' => $request -> temporada,
            'nome' => $request -> nome,
            'posicao' => $request -> posicao,
            'pontuacao' => $request -> pontuacao,
        ]);

        // Retorna uma resposta de sucesso
        return redirect()->route('scores.index')->with('success', 'Conteúdo salvo com sucesso!');
    }

}
