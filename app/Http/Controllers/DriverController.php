<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Equipe;
use Illuminate\Http\Request;

class DriverController extends Controller
{
       /**
     * Armazena o conteúdo no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvarPiloto(Request $request)
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
        $content = Driver::create([
            'temporada' => $request -> temporada,
            'nome' => $request -> nome,
            'posicao' => $request -> posicao,
            'pontuacao' => $request -> pontuacao,
        ]);

        // Retorna uma resposta de sucesso
        return redirect()->route('scores.index')->with('success', 'Conteúdo salvo com sucesso!');
    }

    public function buscar()
    {
        // Busca os dados do banco de dados
        $equipes = Equipe::orderBy('temporada', 'asc')
        ->orderBy('posicao', 'asc')
        ->get();

        // Ordena os drivers por temporada e posição
        $drivers = Driver::orderBy('temporada', 'asc')
                ->orderBy('posicao', 'asc')
                ->get();

        return view('scores', compact('equipes', 'drivers'));
    }

    
}
