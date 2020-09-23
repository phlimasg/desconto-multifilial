<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Mail\FinalizarMail;
use App\Models\Admin\Filial;
use App\Models\Admin\Processo;
use App\Models\Publico\PublicAluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicFinalizarController extends Controller
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
    public function store($filial, $processo, Request $request)
    {

        $processo = Processo::where('url',$processo)->first();            
        $filial = Filial::where('url',$filial)->first();
        $aluno = PublicAluno::where('ra', $request->aluno)
            ->where('processo_id', $processo->id)
            ->first();        
        if(!$processo || !$aluno || !$filial)
            return redirect()->back();

        $aluno->status = 'Em Análise - AS';
        $aluno->save();
        Mail::to($aluno->pResponsavelFinanceiro->email)
        ->send(new FinalizarMail());
        return view('publico.finalizar.index');
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
