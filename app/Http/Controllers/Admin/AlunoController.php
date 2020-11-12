<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DeferidosExport;
use App\Http\Controllers\Controller;
use App\Imports\AlunosImport;
use App\Models\Admin\Aluno;
use App\Models\Admin\Filial;
use App\Models\Admin\Importacao;
use App\Models\Admin\Processo;
use App\Models\Admin\RaLiberado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
        $validator = Validator::make($request->all(),[
            'ra' => 'required|numeric',
            'nome_aluno' => 'required|string',
            'processo_id' => 'required|numeric',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput()->with('modal','modalAdicionarAluno'.$request->processo_id);
        }
        //dd($request->all());

        try {            
                Aluno::create([
                'ra' => $request->ra,
                'nome_aluno' => $request->nome_aluno,
                'processo_id' => $request->processo_id,
                'user_create' => Auth::user()->email,
            ]);
            if(!empty($request->liberar_ra) && $request->liberar_ra == 1){
                RaLiberado::create([
                    'ra' => $request->ra,                    
                    'processo_id' => $request->processo_id,
                    'user_create' => Auth::user()->email,
                ]);
            }
            return redirect()->back()->with('message','Os dados foram salvos com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
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
    public function destroy($id)
    {
        //
    }
    public function importar(Request $request)
    {
        try {
            $arquivo = $this->fileUpload($request->arquivo,$request->processo_id);
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
            
            if(PHP_OS != 'WINNT'){
                chmod(storage_path('/app/public/upload/importacao/'),0777);
                chmod(storage_path('/app/public/upload/importacao/'.$id),0777);
                chmod(storage_path('app/'.$up),0777);
            }
            //dd(storage_path(),$up);
            $doc->nome = $namefile;
            $doc->url = $up;
            $doc->processo_id = $id;
            $doc->save();
            return $doc;
          
    }
    public function deferidosExport($filial, $url)
    {
        try {
            $filial = Filial::where('url', $filial)->first();
            $processo = Processo::where('url',$url)->where('filial_id',$filial->id)->first();            
            
            return Excel::download(new DeferidosExport($processo->id), date('d-m-Y_H:i:s_').$processo->url.'_Deferidos.xlsx');
        } catch (\Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
