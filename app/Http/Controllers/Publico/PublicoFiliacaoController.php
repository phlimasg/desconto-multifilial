<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicFiliacaoRequest;
use App\Models\Admin\Filial;
use App\Models\Admin\Processo;
use App\Models\Publico\PublicAluno;
use App\Models\Publico\PublicFiliacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PublicoFiliacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($filial,$processo,$pAluno)
    {
        //dd(Session::get('ra'));
        if(Session::get('ra') != $pAluno)
        return redirect()->route('FilialProcesso.index',[
            'filial'=> $filial,
            'processo' =>$processo
            ]);        
        $processo = Filial::where('url',$filial)->first()
                    ->ListarProcessos()->where('url',$processo)->first();
        $processo ? '': abort('404','Processo não encontrado');
        $aluno = $processo->pAlunos()->where('ra',$pAluno)->latest()->first();
        $dados = PublicFiliacao::where('public_aluno_id',$aluno->id)->first();
        /*
        if(!$dados){
            $dados = $processo->alunos()->first();        
            $dados->nome ?? $dados->nome = $dados->nome_aluno; 
            $dados->serie ?? $dados->serie = $dados->ano;
            $dados->email ?? $dados->email = $dados->email_aluno;
            $dados->sexo ?? $dados->sexo = $dados->sexo;  
        } */
        //dd($aluno->ra);
        return view('publico.filiacao.show',compact('filial','processo','dados'))->with('aluno',$pAluno);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublicFiliacaoRequest $request, $filial, $processo,$pAluno)
    {
        //dd($request->all());
        //dd($pAluno,$processo,Processo::select('url')->find($request->processo))->url;
        try { 
            //dd($request->all());
            $processo = Processo::find($request->processo);
            $aluno = PublicAluno::where('ra',$pAluno)
            ->where('processo_id',$processo->id)
            ->first();

            $filiacao = PublicFiliacao::updateOrCreate([
                'public_aluno_id'=>$aluno->id,                
            ],$request->except('_token','_method','irmao_select'));
            return redirect()->route('pRespFin.show',[
                'filial'=> $request->filial,
                'processo' => $processo->url,
                'pRespFin'=>$pAluno,
                ]);
            Session::put('ra',$pAluno);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
