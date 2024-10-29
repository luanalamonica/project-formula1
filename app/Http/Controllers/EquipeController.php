<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{

    public function index()
    {
        $equipes = Equipe::all();
        return view('scores', compact('equipes'));
    }


    public function edit($id)
    {
        $equipe = Equipe::findOrFail($id);
        return view('equipes.edit', compact('equipe'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'posicao' => 'required|string',
            'pontuacao' => 'required|integer',
        ]);

        $equipe = Equipe::findOrFail($id);
        $equipe->nome = $request->input('nome');
        $equipe->posicao = $request->input('posicao');
        $equipe->pontuacao = $request->input('pontuacao');
        $equipe->save();

        return redirect('/scores')->with('success', 'Team updated successfully!');
    }

    public function destroy($id)
    {
        $equipe = Equipe::findOrFail($id);
        $equipe->delete();

        return response()->json(['success' => 'Team deleted successfully!']);
    }
}
