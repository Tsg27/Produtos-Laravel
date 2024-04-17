<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\UserLogin;




//-------------Config rota login------------------->
Route::get('/', [UserLogin::class, 'login'])->name('login-page');
Route::post('/auth', [UserLogin::class, 'auth'])->name('auth-user');
Route::get('logout', [UserLogin::class, 'logout'])->name('logout');





//-------------Config rota Produto-------------------->
Route::get('/index', [MyController::class, 'index'])->name('produtos-index');
Route::get('/create', [MyController::class, 'create'])->name('produtos-create');



//-------------Config CRUD Produto-------------------->
//-----Salvar
Route::post('/', [MyController::class, 'store'])->name('produtos-store');
//-----Editar
Route::get('/{id}/edit', [MyController::class, 'edit'])->where('id', '[0-9]+')->name('produtos-edit');
//-----Update
Route::put('/{id}', [MyController::class, 'update'])->where('id', '[0-9]+')->name('produtos-update');
//-----Delete
Route::delete('/{id}', [MyController::class, 'destroy'])->where('id', '[0-9]+')->name('produtos-destroy');


//----------Tratar erro de página não encontrada com URL amigavél------------>
Route::fallback(function () {
    return view('404');
});
