<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Exibe a lista de notícias.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Recuperar todas as notícias do banco de dados
        $noticias = News::all();

        return view('news', compact('noticias')); // Passa as notícias para a view
    }

    /**
     * Exibe o formulário para criar uma nova notícia.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('create_news'); // Retorna a view para criar notícias
    }

    /**
     * Armazena uma nova notícia no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvarNoticia(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tipo' => 'required|string|max:50',
            'descricao' => 'required|string',
            'link' => 'required|string',
        ]);

        // Cria um novo registro no banco de dados
        News::create([
            'titulo' => $request->titulo,
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
            'link' => $request->link,
        ]);

        // Redireciona para a lista de notícias com uma mensagem de sucesso
        return redirect()->route('news')->with('success', 'Content saved successfully!');
    }

    /**
     * Exibe o formulário para editar uma notícia existente.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $noticia = News::findOrFail($id); // Busca a notícia pelo ID
        return view('edit_news', compact('noticia')); // Retorna a view para editar a notícia
    }

    /**
     * Atualiza uma notícia existente no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tipo' => 'required|string|max:50',
            'descricao' => 'required|string',
            'link' => 'required|string',
        ]);

        // Busca a notícia e atualiza os dados
        $noticia = News::findOrFail($id);
        $noticia->update($request->all());

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('news')->with('success', 'News updated successfully!');
    }

    /**
     * Remove uma notícia existente do banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $noticia = News::find($id);

    if ($noticia) {
        $noticia->delete();
        return response()->json(['success' => 'News successfully deleted!']);
    }

    return response()->json(['error' => 'News not found.'], 404);
}

}
