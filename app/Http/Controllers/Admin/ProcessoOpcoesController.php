<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessoOpcoesRequest;
use App\Models\Admin\ProcessosOpcoes;
use Illuminate\Http\Request;

class ProcessoOpcoesController extends Controller
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
    public function store(ProcessoOpcoesRequest $request,$filial, $processo)
    {
        try {
            $processoOpcoes = ProcessosOpcoes::create($request->all());
            return redirect()->back()->with('message', 'Opções do processo adicionado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        dd($filial, $processo, $request->all());
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
    public function destroy($filia,$processo,$id)
    {
        //dd($id);
        try {
            ProcessosOpcoes::destroy($id);
            return redirect()->back()->with('message', 'Opção do processo removida com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
