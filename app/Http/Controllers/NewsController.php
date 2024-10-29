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

        $request->validate([
            'titulo' => 'required|string|max:255',
            'tipo' => 'required|string|max:50',
            'descricao' => 'required|string',
            'link' => 'required|string',
        ]);


        $content = news::create([
            'titulo' => $request->titulo,
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
            'link' => $request->link,
        ]);

        return redirect()->route('news')->with('success', 'Content saved successfully!');
    }
}
