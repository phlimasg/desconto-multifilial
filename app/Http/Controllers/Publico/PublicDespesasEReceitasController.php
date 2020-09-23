<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicDespesasEReceitasRequest;
use App\Models\Admin\Filial;
use App\Models\Admin\Processo;
use App\Models\Publico\PublicAluno;
use App\Models\Publico\PublicDespesasEReceitas;
use App\Models\Publico\PublicDespesasEReceitasDocumentos;
use App\Models\Publico\PublicVeiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublicDespesasEReceitasController extends Controller
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
        //dd($dados);
        $despesas = PublicDespesasEReceitas::where('public_aluno_id',$dados->id)->get();
        
        return view('publico.despesasereceitas.show', compact('filial', 'processo', 'dados','despesas'))->with('aluno', $pPublicRedeDeAbastecimento);        
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
    public function store($filial, $processo, PublicDespesasEReceitasRequest $request)
    {
        try {            
            //dd($filial, $processo,$request->all());
            $processo = Processo::where('url',$processo)->first();            
            $filial = Filial::where('url',$filial)->first();
            $aluno = PublicAluno::where('id', $request->public_aluno_id)
            ->where('processo_id', $processo->id)
            ->first();            
            

            if(!$processo || !$aluno || !$filial)
                return redirect()->back();
            $dados = PublicDespesasEReceitas::create(                               
                $request->except('_token', '_method', 'irmao_select')            
            );

            //dd($dados);
            $this->fileUpload($request->documentos, $dados->id,$processo);            
            return redirect()->back();
            //Session::put('ra', $pAluno);
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
            $despesas = PublicDespesasEReceitas::find($id);
            foreach($despesas->pDespesasEReceitasDocumentos()->get() as $i){
                Storage::delete($i->url);
                PublicDespesasEReceitasDocumentos::destroy($i->id);
            }
            PublicDespesasEReceitas::destroy($id);            
            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function fileUpload($upload,$id,$processo)
    {        
        try {            
            foreach ($upload as $i){
                $doc = new PublicDespesasEReceitasDocumentos();
                $namefile = rand(0,9999).'_'.date('d-m-Y_H-m-s').'_'.Str::kebab($i->getClientOriginalName());
                $up = $i->storeAs('/'.'/public/upload/documentos/despesasereceitas/'.$processo->id.'/'.$id,$namefile);
                if(PHP_OS != 'WINNT'){
                    chmod(storage_path('/app/public/upload/documentos/despesasereceitas/'),0777);
                    chmod(storage_path('/app/public/upload/documentos/despesasereceitas/'.$processo->id.'/'.$id),0777);
                    chmod(storage_path('app/'.$up),0777);
                }
                $doc->nome = $i->getClientOriginalName();
                $doc->nome_novo = $namefile;
                $doc->url = $up;
                $doc->despesas_e_receita_id = $id;
                $doc->save();
                //dd($upload, $i,$id,$processo,$doc,$up);
                if (!$up)
                    return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
