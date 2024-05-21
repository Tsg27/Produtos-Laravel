<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/form-edit.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Editar Produto</title>
</head>
<body>
   <form action="{{ route('produtos-update', ['id'=>$produtos->id]) }}" method="POST">
      @csrf
      @method('PUT')
      <h2>Editar Produto</h2>
      <div class="form-group">
         <label for="nome">Nome do produto:</label>
         <input type="text" name="nome" id="nome" value="{{ $produtos->nome }}">
      </div>
      <div class="form-group">
         <label for="categoria">Categoria</label>
         <input type="text" name="categoria" id="categoria" value="{{ $produtos->categoria }}">
      </div>
      <div class="form-group">
         <label for="validade">Validade:</label>
         <input type="text" name="validade" id="validade" value="{{ $produtos->validade }}" maxlength="7">
      </div>
      <div class="form-group">
         <label for="valor">valor:</label>
         <input type="text" name="valor" id="valor" value="{{ $produtos->valor }}">
      </div>
      <div class="modal-footer">
         <a href="{{ route('index') }}"><button type="submit" class="btn btn-secondary">Voltar</button></a>
         <button type="submit" class="btn btn-success">Atualizar</button>
      </div>
   </form>
</body>
</html>





                        