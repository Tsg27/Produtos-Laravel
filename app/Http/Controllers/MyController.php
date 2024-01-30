<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use Illuminate\Http\Request;

class MyController extends Controller
{

    public function index()
    {
        $jogos = Jogo::orderBy('created_at', 'desc')->get();
        return view('index', ['jogos' => $jogos]);
    }



    public function store(Request $request)
    {
        Jogo::create($request->all());
        return redirect()->route('jogos-index');
    }



    public function edit($id)
    {
        $jogos = Jogo::where('id', $id)->first();
        if (!empty($jogos)) {
            //Redirecionar para form edit
            return view('edit', ['jogos' => $jogos]);
        } else {
            //Redirecionar para index caso id não exista
            return redirect()->route('jogos-index');
        }
    }



    public function update(Request $request, $id)
    {
        $data = [
            'nome' => $request->nome,
            'categoria' => $request->categoria,
            'ano_fabricacao' => $request->ano_fabricacao,
            'valor' => $request->valor,
        ];
        Jogo::where('id', $id)->update($data);
        return redirect()->route('jogos-index');
    }



    public function destroy($id)
    {
        Jogo::where('id', $id)->delete();
        return redirect()->route('jogos-index');
    }
}
