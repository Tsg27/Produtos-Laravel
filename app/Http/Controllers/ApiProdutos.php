<?php

namespace App\Http\Controllers;
use App\Models\Api_produtos;
use Illuminate\Http\Request;

class ApiProdutos extends Controller
{


    public function index() {
        return Api_produtos::all();
    }

    
    public function update(Request $request) {

        // Busca o produto pelo ID
        $produto = Api_produtos::find($request->id);
        if(!$produto ) {
            return response()->json(['message' => 'Produto não atualizado'], 404);
        }

        $produto->nome = $request->nome;
        $produto->categoria = $request->categoria;
        $produto->validade = $request->validade;
        $produto->valor = $request->valor;

        // Salva as alterações no banco de dados
        $produto->save();

        // Retorna uma resposta de sucesso
        return response()->json(['message' => 'Produto atualizado com sucesso'], 200);
    }


    
    public function destroy($id)
    {
        // Busca o produto pelo ID
        $produto = Api_produtos::find($id);

        if ($produto) {
            // Deleta o produto
            $produto->delete();

           // Retorna uma resposta de sucesso
        return response()->json(['message' => 'Item excluido com sucesso!'], 200);
        }

        // Caso o produto não seja encontrado
        return response()->json(['message' => 'Erro ao excluir item'], 404);
    }



}
