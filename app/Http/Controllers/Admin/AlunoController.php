<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\AlunosImport;
use App\Models\Admin\Importacao;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class AlunoController extends Controller
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
    public function destroy($id)
    {
        //
    }
    public function importar(Request $request)
    {
        try {
            $arquivo = $this->fileUpload($request->arquivo,$request->processo_id);
            //dd($arquivo,$arquivo->id);
            Excel::import(new AlunosImport($request->processo_id,$arquivo->id), $arquivo->url);
            return redirect()->back()->with('message','Os dados foram salvos com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());            
        }
        
    }
    public function fileUpload($upload,$id)
    {
        
            $doc = new Importacao();
            $namefile = rand(0,9999).'_'.date('d-m-Y_H-m-s').'_'.Str::kebab($upload->getClientOriginalName());
            $up = $upload->storeAs('/'.'/public/upload/importacao/'.$id,$namefile);
            /*if(PHP_OS != 'WINNT'){
                chmod(storage_path('/app/public/upload/documentos/'),0777);
                chmod(storage_path('/app/public/upload/documentos/'.$id),0777);
                chmod(storage_path('app/public/'.$up),0777);
            }*/
            //dd(storage_path(),$up);
            $doc->nome = $namefile;
            $doc->url = $up;
            $doc->processo_id = $id;
            $doc->save();
            return $doc;
          
    }
}
