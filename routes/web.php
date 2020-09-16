<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Rotas de Login
Route::prefix('google')->namespace('Auth')->group(function(){
    Route::get('login','GoogleController@login');
    Route::get('redirect','GoogleController@redirect');
});

Route::prefix('admin')->namespace('Admin')->group(function(){
    Route::resource('filial', 'FilialController');
    Route::resource('usuarios', 'UsersController');        
    Route::resource('{filial}/processos', 'ProcessoController');
    Route::post('{filial}/processos/{processo}/alunos/importar', 'AlunoController@importar')->name('alunos.importar');
    Route::resource('{filial}/processos/{processo}/alunos', 'AlunoController');
});
