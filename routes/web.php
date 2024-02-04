<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;



//-------------Config rota->MyControoler------------------->

Route::get('/', [MyController::class, 'index'])->name('jogos-index');
//Route::get('/create', [MyController::class,'create'])->name('jogos-create');


//-------------Config CRUD->CRUD->MyControoler------------------->
Route::post('/', [MyController::class, 'store'])->name('jogos-store'); //-----Salvar

Route::get('/{id}/edit', [MyController::class, 'edit'])->where('id', '[0-9]+')->name('jogos-edit'); //-----Editar

Route::put('/{id}', [MyController::class, 'update'])->where('id', '[0-9]+')->name('jogos-update'); //-----Atualizar

Route::delete('/{id}', [MyController::class, 'destroy'])->where('id', '[0-9]+')->name('jogos-destroy'); //-----Excluir


//----------Tratar erro de página não encontrada com URL amigavél------------>
Route::fallback(function () {
    return view('404');
});
