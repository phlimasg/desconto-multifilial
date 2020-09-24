<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicSituacaoHabitacionalRequest;
use App\Models\Admin\Filial;
use App\Models\Admin\Processo;
use App\Models\Publico\PublicAluno;
use App\Models\Publico\PublicSituacaoHabitacional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PublicSituacaoHabitacionalController extends Controller
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
    public function show($filial, $processo, $pSituacaoHabitacional)
    {
        //dd(Session::get('ra'));
        if (Session::get('ra') != $pSituacaoHabitacional)
            return redirect()->route('FilialProcesso.index', [
                'filial' => $filial,
                'processo' => $processo
            ]);
        $processo = Filial::where('url', $filial)->first()
            ->ListarProcessos()->where('url', $processo)->first();
        $processo ? '' : abort('404', 'Processo não encontrado');        
        $dados = PublicAluno::where('ra',$pSituacaoHabitacional)->where('processo_id',$processo->id)->first()->pResponsavelFinanceiro->pSituacaohabitacional;
        !$dados ? $dados = $processo : '';        
        $aluno = $processo->pAlunos()->where('ra', $pSituacaoHabitacional)->latest()->first();
       
        return view('publico.situhabita.show', compact('filial', 'processo', 'dados'))->with('aluno', $pSituacaoHabitacional);
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
    public function update($filial, $processo, $pAluno, PublicSituacaoHabitacionalRequest $request)
    {
        try {
            $processo = Processo::find($request->processo);
            $filial = Filial::where('url',$filial)->first();
            $aluno = PublicAluno::where('ra', $pAluno)
                ->where('processo_id', $processo->id)
                ->first();
            //dd($request->all(), $filial, $processo, $aluno->pResponsavelFinanceiro);
            $SituacaoHabitacional = PublicSituacaoHabitacional::updateOrCreate(
                [
                    'public_resp_fin_id' => $aluno->pResponsavelFinanceiro->id,
                ],
                $request->except('_token', '_method', 'irmao_select')
            );


            return redirect()->route('pRedeDeAbastecimento.show', [
                'filial' => $request->filial,
                'processo' => $processo->url,
                'pRedeDeAbastecimento' => $pAluno,
            ]);      
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
