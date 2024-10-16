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
        return view('scores', compact('scores')); // Retorna a view 'equipes.index' com as equipes
    }

   // Método para editar uma equipe
   public function edit($id)
   {
       $equipe = Equipe::findOrFail($id);
       return view('equipes.edit', compact('equipe'));
   }

   // Método para atualizar uma equipe
   public function update(Request $request, $id)
   {
       $equipe = Equipe::findOrFail($id);
       $equipe->nome = $request->input('nome');
       $equipe->pontuacao = $request->input('pontuacao');
       $equipe->save();

       return redirect()->route('scores')->with('success', 'Equipe atualizada com sucesso!');
   }

   // Método para excluir uma equipe
   public function destroy($id)
   {
       $equipe = Equipe::findOrFail($id);
       $equipe->delete();

       return redirect()->route('scores')->with('success', 'Equipe excluída com sucesso!');
   }
}

