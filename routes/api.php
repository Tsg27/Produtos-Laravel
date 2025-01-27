<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ApiProdutos;
use Illuminate\Support\Facades\Route;



Route::get('/produtos', [ApiProdutos::class, 'index']);
Route::post('/produtos', [ApiProdutos::class, 'store']);
Route::put('/produtos/{id}', [ApiProdutos::class, 'update']);

