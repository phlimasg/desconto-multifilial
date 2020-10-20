<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilialRequest;
use App\Models\Admin\Filial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilialController extends Controller
{

    private $repository;

    public function __construct(Filial $filial)
    {
        $this->repository = $filial;           
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filials = $this->repository->latest()->paginate(5);        
        return view('admin.filial.index', compact('filials'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.filial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilialRequest $request)
    {
        try {   
            $this->authorize('Administrador', Auth::user());           
            $this->repository->create($request->all());
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
        try {        
            //dd($id);
            $filial = $this->repository->findOrFail($id);
            return view('admin.filial.show', compact('filial'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());            
        }
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
        try { 
            $this->authorize('Administrador', Auth::user());        
            Filial::findOrFail($id)->update($request->except('_token','_method'));   
            return redirect()->back()->with('message','Os dados foram salvos com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());            
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
