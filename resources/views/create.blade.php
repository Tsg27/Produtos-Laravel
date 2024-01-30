@extends('layouts.modelo')

@section('title','Cadastro')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-10">
        <h1>Adicionar Jogo</h1>
    </div>
    <div class="col-sm-2">
        <a href="{{ route('jogos-index') }}" class="btn btn-secondary">Voltar</a>
    </div>
    </div>
    <hr>
    <form action="{{ route('jogos-store') }}" method="POST"> {{-----Metodo Salvar-----}}
    @csrf
        <div class="form-group">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite um nome..." required>
            </div>
            <br>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <input type="text" name="categoria" id="categoria" class="form-control" placeholder="Digite uma categoria..." required>
            </div>
            <br>
            <div class="form-group">
                <label for="ano_criacao">Ano de Criação:</label>
                <input type="text" name="ano_criacao" id="ano_criacao"  class="form-control" maxlength="4" placeholder="Digite o ano..." required>
            </div>
            <br>
            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="number" name="valor" id="valor" class="form-control" placeholder="Digite o valor..." required>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Cadastrar">
            </div>
        </div>
        </form>
    </div>
@endsection



