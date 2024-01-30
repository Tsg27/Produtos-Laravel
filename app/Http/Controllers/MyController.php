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
        if(!empty($jogos))
        {

            return view('edit', ['jogos' => $jogos]); //Redirecionar para form edit

        }
        else
        {
            return redirect()->route('jogos-index'); //Redirecionar para index caso id não seja encontrado
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
        Jogo::where('id',$id)->update($data);
        return redirect()->route('jogos-index'); //Nome da rota
    }

    public function destroy($id)
    {
        Jogo::where('id',$id)->delete();
        return redirect()->route('jogos-index');
    }









}
