<?php

namespace App\Http\Controllers;

use App\Models\Driver; 
use Illuminate\Http\Request;

class PilotoController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('drivers.index', compact('drivers'));
    }

    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'posicao' => 'required|string|max:50',
            'pontuacao' => 'required|integer',
        ]);

        $driver = Driver::findOrFail($id);
        $driver->nome = $request->input('nome');
        $driver->posicao = $request->input('posicao');
        $driver->pontuacao = $request->input('pontuacao');
        $driver->save();

        return redirect()->route('scores')->with('success', 'Piloto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return response()->json(['success' => 'Piloto excluído com sucesso!']);
    }
}
