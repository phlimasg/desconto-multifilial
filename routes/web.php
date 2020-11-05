<?php
use Illuminate\Support\Facades\Route;

Route::get('/','Publico\PublicIndexController@index');
Route::get('{id}','Publico\PublicIndexController@show');

//Rotas de Login
Route::prefix('google')->namespace('Auth')->group(function(){
    Route::get('login','GoogleController@login')->name('google.login');
    Route::get('redirect','GoogleController@redirect');
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::group(['middleware' => ['auth']], function () { 
    Route::prefix('admin')->namespace('Admin')->group(function(){
        Route::resource('filial', 'FilialController');
        Route::resource('usuarios', 'UsersController');        
        Route::resource('{filial}/processos', 'ProcessoController');
        Route::post('{filial}/processos/liberarRa', 'ProcessoController@liberarRa')->name('processo.liberarRa');
    
        Route::prefix('{filial}/{processo}')->group(function(){
            Route::post('alunos/importar', 'AlunoController@importar')->name('alunos.importar');
            Route::resource('alunos', 'AlunoController');
            Route::resource('analisar', 'AnalisarController');
            Route::resource('processoOpcoes', 'ProcessoOpcoesController');
        });
    });
});

Route::get('/{filial}/{processo}/','Publico\PublicoAlunoController@index')->name('FilialProcesso.index');
Route::post('/{filial}/{processo}/login','Publico\PublicoAlunoController@login')->name('pAluno.login');
Route::resource('/{filial}/{processo}/pAluno','Publico\PublicoAlunoController');
Route::resource('/{filial}/{processo}/pFiliacao','Publico\PublicoFiliacaoController');
Route::resource('/{filial}/{processo}/pRespFin','Publico\PublicoRespFinController');
Route::resource('/{filial}/{processo}/pComposicaoFamiliar','Publico\PublicoComposicaoFamiliarController');
Route::resource('/{filial}/{processo}/pDocumentos','Publico\PublicReceitasDocumentosController');
Route::resource('/{filial}/{processo}/pSituacaoHabitacional','Publico\PublicSituacaoHabitacionalController');
Route::resource('/{filial}/{processo}/pRedeDeAbastecimento','Publico\PublicRedeDeAbastecimentoController');
Route::resource('/{filial}/{processo}/pVeiculos','Publico\PublicVeiculosController');
Route::resource('/{filial}/{processo}/pDespesasEReceitas','Publico\PublicDespesasEReceitasController');
Route::resource('/{filial}/{processo}/pFinalizar','Publico\PublicFinalizarController');