<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;



//-------------Config rota->MyControoler------------------->

Route::get('/', [MyController::class, 'index'])->name('produtos-index');
Route::get('/create', [MyController::class,'create'])->name('produtos-create');


//-------------Config rotas->CRUD->MyControoler------------------->
Route::post('/', [MyController::class, 'store'])->name('produtos-store'); //-----Salvar

Route::get('/{id}/edit', [MyController::class, 'edit'])->where('id', '[0-9]+')->name('produtos-edit'); //-----Editar

Route::put('/{id}', [MyController::class, 'update'])->where('id', '[0-9]+')->name('produtos-update'); //-----Atualizar

Route::delete('/{id}', [MyController::class, 'destroy'])->where('id', '[0-9]+')->name('produtos-destroy'); //-----Excluir


//----------Tratar erro de página não encontrada com URL amigavél------------>
Route::fallback(function () {
    return view('404');
});
