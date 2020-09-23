<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicVeiculosRequest;
use App\Models\Admin\Filial;
use App\Models\Admin\Processo;
use App\Models\Publico\PublicAluno;
use App\Models\Publico\PublicVeiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PublicVeiculosController extends Controller
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
    public function store($filial, $processo, PublicVeiculosRequest $request)
    {
        
        try {
            $processo = Processo::find($processo);            
            $filial = Filial::where('url',$filial)->first();
            $aluno = PublicAluno::where('ra', $request->public_aluno_id)
                ->where('processo_id', $processo->id)
                ->first();
                
            //dd($filial, $processo, $request->all(),$aluno);
            if(!$processo || !$aluno || !$filial)
                return redirect()->back();
            PublicVeiculos::create(                               
                $request->except('_token', '_method', 'irmao_select')            
            );            
            
            return redirect()->back();
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
    public function show($filial, $processo, $pPublicRedeDeAbastecimento)
    {        
        if (Session::get('ra') != $pPublicRedeDeAbastecimento)
            return redirect()->route('FilialProcesso.index', [
                'filial' => $filial,
                'processo' => $processo
            ]);
        $processo = Filial::where('url', $filial)->first()
            ->ListarProcessos()->where('url', $processo)->first();
        $processo ? '' : abort('404', 'Processo não encontrado');
        
        $dados = $processo->pAlunos()->where('ra', $pPublicRedeDeAbastecimento)
        ->where('processo_id',$processo->id)->latest()->first();
        $veiculos = PublicVeiculos::where('public_resp_fin_id',$dados->pResponsavelFinanceiro->id)->get();
        //dd($processo->pAlunos()->get(),$dados);
        //dd($veiculos);
        
        return view('publico.veiculos.show', compact('filial', 'processo', 'dados','veiculos'))->with('aluno', $pPublicRedeDeAbastecimento);        
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
    public function destroy($filial, $processo, $id)
    {
        try {
            $processo = Processo::find($processo);            
            $filial = Filial::where('url',$filial)->first();
            $aluno = PublicAluno::where('ra', Session::get('ra'))
                ->where('processo_id', $processo->id)
                ->first();
            if(!$processo || !$aluno || !$filial)
                return redirect()->back();
            $veiculo = PublicVeiculos::find($id);
            if($aluno->pResponsavelFinanceiro->id == $veiculo->public_resp_fin_id)
                $veiculo->destroy($id);
            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
