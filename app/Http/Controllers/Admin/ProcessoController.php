<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessoRequest;
use App\Models\Admin\Filial;
use App\Models\Admin\Processo;
use Illuminate\Http\Request;

class ProcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filial)
    {        
        //dd(PHP_OS);
        $data = Filial::where('url',$filial)->first()->ListarProcessos()->latest()->paginate(5);        
        return view('admin.processo.index', compact('data','filial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($filial)
    {
        return view('admin.processo.create',compact('filial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcessoRequest $request)
    {
        try {
            $filial = Filial::select('id')->where('url',$request->filial)->firstOrFail();            
            Processo::create([
                'nome' => $request->nome,
                'periodo_ini' => $request->periodo_ini.' '.$request->hora_ini,
                'periodo_fim' => $request->periodo_fim.' '.$request->hora_fim,
                'filial_id' => $filial->id,
            ]);
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
}
