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

Route::get('/{filial}/{processo}/','Publico\PublicoAlunoController@index')->name('FilialProcesso.index');
Route::post('/{filial}/{processo}/login','Publico\PublicoAlunoController@login')->name('pAluno.login');
Route::resource('/{filial}/{processo}/pAluno','Publico\PublicoAlunoController');
Route::resource('/{filial}/{processo}/pFiliacao','Publico\PublicoFiliacaoController');
Route::resource('/{filial}/{processo}/pRespFin','Publico\PublicoRespFinController');
Route::resource('/{filial}/{processo}/pComposicaoFamiliar','Publico\PublicoComposicaoFamiliarController');
Route::resource('/{filial}/{processo}/pDocumentos','Publico\PublicReceitasDocumentosController');
Route::resource('/{filial}/{processo}/pSituacaoHabitacional','Publico\PublicSituacaoHabitacionalController');