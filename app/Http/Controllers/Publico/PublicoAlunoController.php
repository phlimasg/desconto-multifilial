<?php

namespace App\Http\Controllers\Publico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PublicAlunoRequest;
use App\Models\Admin\Filial;
use App\Models\Admin\Processo;
use App\Models\Admin\RaLiberado;
use App\Models\Publico\PublicAluno;
use DateTime;
use Illuminate\Support\Facades\Session;

class PublicoAlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filial,$processo)
    {
        $filial = Filial::where('url',$filial)->first();
        $processo = $filial->ListarProcessos()->where('url',$processo)->first();
        $processo ? '': abort('404','Processo não encontrado');
        return view('publico.aluno.index',compact('filial','processo'));
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
    public function store(PublicAlunoRequest $request)
    {
        try {            
            $aluno = PublicAluno::updateOrCreate($request->all());
            return redirect()->route('seila',[
                'filial'=> $request->filial,
                'processo' => $request->processo,
                'ra'=>$aluno->ra,
                ]);
            dd($request->all());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($filial,$processo,$pAluno)
    {   
        if(Session::get('ra') != $pAluno)
        return redirect()->route('FilialProcesso.index',[
            'filial'=> $filial,
            'processo' =>$processo
            ]);        
        $processo = Filial::where('url',$filial)->first()
                    ->ListarProcessos()->where('url',$processo)->first();
        $processo ? '': abort('404','Processo não encontrado');
        $dados = $processo->pAlunos()->where('ra',$pAluno)->latest()->first();
        if(!$dados){
            $dados = $processo->alunos()->where('ra',$pAluno)->latest()->first();        
            $dados->nome ?? $dados->nome = $dados->nome_aluno; 
            $dados->serie ?? $dados->serie = $dados->ano;
            $dados->email ?? $dados->email = $dados->email_aluno;
            $dados->sexo ?? $dados->sexo = $dados->sexo;  
        } 
        //dd('dd',Session::get('ra'),$dados, $filial,$processo,$pAluno);
        return view('publico.aluno.show',compact('filial','processo','dados'))->with('aluno',$pAluno);
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
    public function update(PublicAlunoRequest $request, $filial, $processo,$pAluno)
    {
        
        $url = Processo::select('url')->find($request->processo);
        try {            
            $aluno = PublicAluno::updateOrCreate([
                'ra' => $pAluno,
                'processo_id'=>$processo,
            ],
                $request->except('_token','_method','irmao_select')
             );

            //dd($request->all(),$aluno,$pAluno,$processo, Session::get('ra'));
            return redirect()->route('pFiliacao.show',[
                'filial'=> $request->filial,
                'processo' => $url->url,
                'pFiliacao'=>$pAluno,
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
    public function login(Request $request)
    {
        try {
            $filial = Filial::where('url',$request->filial)->first();
            
            $processo = $filial->ListarProcessos()->where('url',$request->processo)                
                ->first();
            $aluno = $processo->alunos()->where('ra',$request->ra)->first();
           
            if(!$aluno)
                return redirect()->back()->with('message','Aluno não encontrado');
            elseif(!empty($processo->pAlunos->where('ra',$request->ra)->first()->status) && $processo->pAlunos->where('ra',$request->ra)->first()->status=='Falta Documento'){
                Session::put('ra',$aluno->ra);
                return redirect()
                ->route('pAluno.show',
                [
                    'filial'=>$request->filial,
                    'processo'=>$request->processo,
                    'pAluno' => $aluno->ra
                    ]);
            }else{
                $ra_liberado = RaLiberado::where('ra',$request->ra)->where('processo_id',$processo->id)->latest()->first();
                $aluno_processo = $processo->pAlunos->where('ra',$request->ra)->first();

                
                //dd($intervalo,intval($intervalo->format('%d')));
                if(!empty($ra_liberado) && empty($aluno_processo->status)){
                    $horaLibera = new DateTime($ra_liberado->created_at);
                    $horaAtual = new DateTime(date('Y-m-d H:i:s'));
                    $intervalo = $horaLibera->diff($horaAtual);
                    if(intval($intervalo->format('%d')) < 2){
                        Session::put('ra',$ra_liberado->ra);
                        return redirect()
                        ->route('pAluno.show',
                        [
                            'filial'=>$request->filial,
                            'processo'=>$request->processo,
                            'pAluno' => $ra_liberado->ra
                            ]);
                    }
                }
            }
            $processo = $filial->ListarProcessos()->where('url',$request->processo)    
                ->where('periodo_ini','<=',date('Y-m-d H:i:s'))
                ->where('periodo_fim','>=',date('Y-m-d H:i:s'))
                ->first();
            if(!$processo) 
                return redirect()->back()->with('message','Prazo finalizado.'); 
            
            Session::put('ra',$aluno->ra);
            return redirect()
            ->route('pAluno.show',
            [
                'filial'=>$request->filial,
                'processo'=>$request->processo,
                'pAluno' => $aluno->ra
                ]);                 

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
