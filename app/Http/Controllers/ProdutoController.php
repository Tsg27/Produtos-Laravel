<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto; 

class ProdutoController extends Controller
{

    /**
      * Exiba uma listagem do recurso.
      */
    public function index()
    {
        $produtos = Produto::orderBy('created_at', 'desc')->get();
        return view('/index', ['produtos' => $produtos]);

    }

   /**
      * Armazene um recurso recém-criado no armazenamento.
      */
    public function store(Request $request)
    {
        Produto::create($request->all());
        return redirect()->route('index');

    }


    /**
      * Mostre o formulário para edição do recurso especificado.
      */
    public function edit(string $id)
    {
        $produtos = Produto::where('id', $id)->first();
        if (!empty($produtos)) {
            //Redirecionar para form edit
            return view('edit', ['produtos' => $produtos]);
        } else {
            //Redirecionar para index caso id não exista
            return redirect()->route('index');
        }

    }


   /**
      * Atualize o recurso especificado no armazenamento.
      */
    public function update(Request $request, $id)
    {
        $data = [
            'nome' => $request->nome,
            'categoria' => $request->categoria,
            'validade' => $request->validade,
            'valor' => $request->valor,
        ];
        Produto::where('id', $id)->update($data);
        return redirect()->route('index');

    }


    /**
      * Remova o recurso especificado do armazenamento.
      */
    public function destroy($id)
    {
        Produto::where('id', $id)->delete();
        return redirect()->route('index');

    }
}
