<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicComposicaoFamiliarRequest;
use App\Models\Admin\Filial;
use App\Models\Admin\Processo;
use App\Models\Publico\PublicAluno;
use App\Models\Publico\PublicComposicaoFamiliar;
use App\Models\Publico\PublicReceitasDocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PublicoComposicaoFamiliarController extends Controller
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
    public function update(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($filial, $processo, $pAluno)
    {        
        if (Session::get('ra') != $pAluno)
            return redirect()->route('FilialProcesso.index', [
                'filial' => $filial,
                'processo' => $processo
            ]);
        $processo = Filial::where('url', $filial)->first()
            ->ListarProcessos()->where('url', $processo)->first();
        $processo ? '' : abort('404', 'Processo não encontrado');
        $dados = $processo->pAlunos()->where('ra', $pAluno)->latest()->first();
        //dd($dados);
        if($dados->pComposicaoFamiliar()->count() <= 0){
            $dados->parentesco ?? $dados->parentesco = 'Aluno'; 
        }        
        return view('publico.compfam.show', compact('filial', 'processo', 'dados'))->with('aluno', $pAluno);
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
    public function store($filial, $processo, PublicComposicaoFamiliarRequest $request)
    {
        
        try {            
            $processo = Processo::find($request->processo_id);            
            $filial = Filial::where('url',$filial)->first();
            $aluno = PublicAluno::where('id', $request->public_aluno_id)
                ->where('processo_id', $processo->id)
                ->first();

            if(!$processo || !$aluno || !$filial)
                return redirect()->back();
            
            $comp = PublicComposicaoFamiliar::create(                               
                $request->except('_token', '_method', 'irmao_select')            
            );
            
            $this->fileUpload($request->documentos, $comp->id,$processo);            
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
    public function destroy($id)
    {
        //
    }

    public function fileUpload($upload,$id,$processo)
    {        
        try {            
            foreach ($upload as $i){
                $doc = new PublicReceitasDocumentos();
                $namefile = rand(0,9999).'_'.date('d-m-Y_H-m-s').'_'.Str::kebab($i->getClientOriginalName());
                $up = $i->storeAs('/'.'/public/upload/documentos/'.$processo->id.'/'.$id,$namefile);
                if(PHP_OS != 'WINNT'){
                    chmod(storage_path('/app/public/upload/documentos/'),0777);
                    chmod(storage_path('/app/public/upload/documentos/processo/'.$processo->id.'/'.$id),0777);
                    chmod(storage_path('app/'.$up),0777);
                }
                $doc->nome = $i->getClientOriginalName();
                $doc->nome_novo = $namefile;
                $doc->url = $up;
                $doc->public_composicao_familiar_id = $id;
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
