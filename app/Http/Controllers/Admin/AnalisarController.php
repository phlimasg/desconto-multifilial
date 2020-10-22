<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnaliseAsRequest;
use App\Http\Requests\AnaliseComissaoRequest;
use App\Mail\DeferidoMail;
use App\Mail\StatusMail;
use App\Models\Admin\Analise;
use App\Models\Admin\DescontoHistorico;
use App\Models\Admin\Filial;
use App\Models\Admin\MensagemInterna;
use App\Models\Admin\MensagemUsuario;
use App\Models\Publico\PublicAluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AnalisarController extends Controller
{

    
    public function index($filial, $processo)
    {
        $filial = Filial::where('url',$filial)->first();        
        $processo = $filial->ListarProcessos()->where('url',$processo)->first();
        $data = PublicAluno::where('processo_id', $processo->id)->get();
        //dd($data);
        return view('admin.analise.index',compact('filial','processo','data'));
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
    public function store($filial, $processo,AnaliseAsRequest $request)
    {        
        $filial = Filial::where('url',$filial)->first();
        $processo = $filial->ListarProcessos->where('url',$processo)->first();
        
        if($processo){
            $aluno = PublicAluno::where('id',$request->public_aluno_id)->update(
                ['status'=>$request->status]
            );
            $analise = Analise::updateOrCreate(
                ['public_aluno_id' => $request->public_aluno_id],
                $request->except(['_token','msg_interna','msg_usuario','irmao','status'])
            );
            if($request->msg_usuario){
                $mensagem = MensagemUsuario::create([
                    'msg_usuario' => $request->msg_usuario,
                    'public_aluno_id' => $request->public_aluno_id,
                    'processo_id' => $processo->id,
                ]);
            }
            if($request->msg_interna){
                $mensagem = MensagemInterna::create([
                    'msg_usuario' => $request->msg_interna,
                    'public_aluno_id' => $request->public_aluno_id,
                    'processo_id' => $processo->id,
                ]);
            }
            $aluno = PublicAluno::find($request->public_aluno_id);
            
            if($request->status == 'Falta Documento' && !empty($request->msg_usuario) || $request->status == 'Deferido'){
                empty($mensagem) ? $mensagem = null : '';
                Mail::to($aluno->pResponsavelFinanceiro->email)->send(new StatusMail($aluno, $mensagem));
            }
            return redirect()->back()->with('message','Dados salvos/atualizados com sucesso!');
        }            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($filial, $processo, $id)
    {        
        $filial = Filial::where('url',$filial)->first();
        $processo = $filial->ListarProcessos->where('url',$processo)->first();
        $dados = PublicAluno::find($id);     
        return view('admin.analise.show',compact('filial','processo','dados'));
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
    public function update($filial, $processo, AnaliseComissaoRequest $request, $id)
    {
        try {
            //dd($request->all());
        $filial = Filial::where('url',$filial)->first();
        $processo = $filial->ListarProcessos->where('url',$processo)->first();
        
        if($processo){
            if($request->status=='Deferido'){
                $aluno = PublicAluno::where('id',$request->public_aluno_id)->update(
                    [
                        'status'=>$request->status,
                        'desconto_deferido'=>$request->desconto_sugerido
                    ]
                );                
            }else{
                $aluno = PublicAluno::where('id',$request->public_aluno_id)->update(
                    [
                        'status'=>$request->status
                    ]);
            }
            $descHistorico = DescontoHistorico::create([
                'percentual' => $request->desconto_sugerido,
                'analise_id'=> $id,
                'public_aluno_id'=>$request->public_aluno_id,
                'processo_id'=>$processo->id
            ]);
            if($request->msg_usuario){
                $mensagem = MensagemUsuario::create([
                    'msg_usuario' => $request->msg_usuario,
                    'public_aluno_id' => $request->public_aluno_id,
                    'processo_id' => $processo->id,
                ]);
            }
            if($request->msg_interna){
                $mensagem = MensagemInterna::create([
                    'msg_interna' => $request->msg_interna,
                    'public_aluno_id' => $request->public_aluno_id,
                    'processo_id' => $processo->id,
                ]);
            }
            $aluno = PublicAluno::find($request->public_aluno_id);
            /*if($request->status == 'Deferido'){
                Mail::to($aluno->pResponsavelFinanceiro->email)->send(new DeferidoMail($aluno));
            }*/
            if($request->status == 'Falta Documento' && !empty($request->msg_usuario) || $request->status == 'Deferido'){
                empty($mensagem) ? $mensagem = null : '';
                Mail::to($aluno->pResponsavelFinanceiro->email)->send(new StatusMail($aluno, $mensagem));
            }
            return redirect()->back()->with('message','Dados salvos/atualizados com sucesso!');
        }  
        } catch (\Exception $e) {
            redirect()->back()->with('message',$e->getMessage());
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
