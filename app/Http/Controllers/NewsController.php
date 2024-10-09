<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Armazena o conteúdo no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvarNoticia(Request $request)
    {
        // dd($request);
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'tipo' => 'required|string|max:50',
            'descricao' => 'required|string',
            'link' => 'required|string',
        ]);

        // Cria um novo registro no banco de dados
        $content = news::create([
            'titulo' => $validatedData['titulo'],
            'tipo' => $validatedData['tipo'],
            'descricao' => $validatedData['descricao'],
            'link' => $validatedData['link'],
        ]);

        // Retorna uma resposta de sucesso
        return redirect()->route('news')->with('success', 'Conteúdo salvo com sucesso!');
    }
}