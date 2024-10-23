<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeitorController;
use App\Http\Controllers\LivroController;

Route::get('/', function () {
    return view('leitores-auth.login');
});

Route::get('/login', [LeitorController::class, 'create'])->name('login');
Route::post('/login', [LeitorController::class, 'store']);
Route::post('logout', [LeitorController::class, 'destroy']);


Route::controller(LivroController::class)->group(function () {
    Route::get('/livros', 'index');

    //Create
    Route::get('/livros/create', 'create');

    //Show
    Route::get('/livros/{livro}', 'show');
    Route::post('livros', 'store');

    //Edit
    Route::get('/livros/{livro}/edit',  'edit');

    //Update
    Route::patch('/livros/{livro}', 'update');

    //Delete or destroy 
    Route::delete('/livros/{livro}', 'delete');
});