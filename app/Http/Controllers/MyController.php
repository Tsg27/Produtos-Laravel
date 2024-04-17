<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class MyController extends Controller
{

    public function index()
    {
        $produtos = Produto::orderBy('created_at', 'desc')->get();
        return view('index', ['produtos' => $produtos]);
    }



    public function store(Request $request)
    {
        Produto::create($request->all());
        return redirect()->route('produtos-index');
    }


    public function edit($id)
    {
        $produtos = Produto::where('id', $id)->first();
        if (!empty($produtos)) {
            //Redirecionar para form edit
            return view('edit', ['produtos' => $produtos]);
        } else {
            //Redirecionar para index caso id não exista
            return redirect()->route('produtos-index');
        }
    }



    public function update(Request $request, $id)
    {
        $data = [
            'nome' => $request->nome,
            'categoria' => $request->categoria,
            'validade' => $request->validade,
            'valor' => $request->valor,
        ];
        Produto::where('id', $id)->update($data);
        return redirect()->route('produtos-index');
    }



    public function destroy($id)
    {
        Produto::where('id', $id)->delete();
        return redirect()->route('produtos-index');
    }
}
