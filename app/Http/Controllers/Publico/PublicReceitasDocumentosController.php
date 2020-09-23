<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicReceitasDocumentosRequest;
use App\Models\Admin\Filial;
use App\Models\Admin\Processo;
use App\Models\Publico\PublicAluno;
use App\Models\Publico\PublicComposicaoFamiliar;
use App\Models\Publico\PublicReceitasDocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublicReceitasDocumentosController extends Controller
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
    public function store($filial, $processo, PublicReceitasDocumentosRequest $request)
    {
        //dd($filial, $processo, $request->all());
        try {            
            $processo = Processo::where('url',$processo)->first();            
            $filial = Filial::where('url',$filial)->first();
            //dd($request->all(),$processo, $filial);
            if(!$processo || !$filial)
                return redirect()->back();
            
            $this->fileUpload($request->documentos, $request->comp_id,$processo);            
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
    public function show($id)
    {
        //
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
    public function destroy($filial,$url,$id)
    {        
        $documento = PublicReceitasDocumentos::find($id);
        if(Session::get('ra') == $documento->pComposicaoFamiliar->pAluno->ra){
            Storage::delete($documento->url);
            $documento->destroy($id);
        }
        return redirect()->back();
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
                    chmod(storage_path('/app/public/upload/documentos/'.$processo->id.'/'.$id),0777);
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
