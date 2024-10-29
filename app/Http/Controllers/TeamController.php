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

        $request->validate([
            'temporada' => 'required|string|max:255',
            'nome' => 'required|string|max:50',
            'posicao' => 'required|string',
            'pontuacao' => 'required|string',
        ]);


        $content = Equipe::create([
            'temporada' => $request->temporada,
            'nome' => $request->nome,
            'posicao' => $request->posicao,
            'pontuacao' => $request->pontuacao,
        ]);

        return redirect()->route('scores')->with('success', 'Content saved successfully!');
    }
}
