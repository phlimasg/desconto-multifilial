<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnaliseAsRequest;
use App\Models\Admin\Analise;
use App\Models\Admin\Filial;
use App\Models\Publico\PublicAluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnalisarController extends Controller
{

    
    public function index($filial, $processo)
    {
        $filial = Filial::where('url',$filial)->first();
        $processo = $filial->ListarProcessos->where('url',$processo)->first();
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
        dd($request->all());
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
    public function update(Request $request, $id)
    {
        //
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
