<?php

namespace App\Http\Controllers;
use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    // Método para listar todas as equipes
    public function index()
    {
        $equipes = Equipe::all(); // Recupera todas as equipes do banco de dados
        return view('scores', compact('equipes')); // Passa as equipes para a view
    }

   // Método para editar uma equipe
   public function edit($id)
{
    $equipe = Equipe::findOrFail($id); // Encontra a equipe pelo ID ou lança um erro 404
    return view('equipes.edit', compact('equipe')); // Retorna a view de edição
}

   // Método para atualizar uma equipe
   public function update(Request $request, $id)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'posicao' => 'required|string', // Validação da posição
        'pontuacao' => 'required|integer',
    ]);

    $equipe = Equipe::findOrFail($id);
    $equipe->nome = $request->input('nome');
    $equipe->posicao = $request->input('posicao'); // Atualiza a posição
    $equipe->pontuacao = $request->input('pontuacao');
    $equipe->save();

    return redirect('/scores')->with('success', 'Equipe atualizada com sucesso!'); // Redireciona para a página de scores
}

   // Método para excluir uma equipe
   public function destroy($id)
   {
       $equipe = Equipe::findOrFail($id);
       $equipe->delete();
   
       return response()->json(['success' => 'Equipe excluída com sucesso!']);
   }   
}

