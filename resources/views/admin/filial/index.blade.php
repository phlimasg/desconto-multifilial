@extends('adminlte::page')

@section('title', 'Filiais')

@section('content_header')
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Filiais</h1>
        </div>
        @can('Administrador', Auth::user())
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <a href="{{ route('filial.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Filial</a>
          </ol>
        </div>          
        @endcan
      </div>
    </div><!-- /.container-fluid -->  
@stop

@section('content')
<div class="row">
  @foreach ($filials as $i)
  @can('Filial', [$i,Auth::user()])
      <div class="col-md-3">
        <div class="card bg-dark">                         
          <div class="card-tools" style="right: 0; position: absolute">              
            <a href="{{ route('filial.show', ['filial'=> $i->id]) }}" class="btn btn-tool"><i class="fa fa-pen"></i> </a>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 text-center" style="min-height: 150px">
                <div style="min-height: 100px; align-content: center" class="">
                  <img src="{{ url($i->logo_url) }}" alt="" srcset="" style="width: 100%">
                </div>
                <h4 for="">{{$i->nome}}</h4>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <a href="{{ route('processos.index', ['filial'=> $i->url]) }}" class="btn btn-primary btn-block"><i class="fa fa-eye "></i> Processos</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endcan
  @endforeach
    <!--<div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Filiais cadastradas</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header 
        <div class="card-body table-responsive p-0" style="height: 70vh;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Cod. Unidade</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($filials as $i)
                @can('Filial', [$i,Auth::user()])
                  <tr>
                    <td>{{$i->id}}</td>
                    <td>{{$i->codigo}}</td>
                    <td>{{$i->nome}}</td>
                    <td>{{$i->descricao}}</td>
                    <td><a href="{{ route('filial.show', ['filial'=> $i->id]) }}" class="btn"><i class="fa fa-edit"></i> </a></td>
                    <td><a href="{{ route('processos.index', ['filial'=> $i->url]) }}" class="btn btn-primary"><i class="fa fa-eye "></i> Processos</a></td>
                  </tr> 
                @endcan
              @endforeach             
            </tbody>
          </table>
        </div>
        /.card-body 

         /.card
      </div>-->
            <div class="card-footer clearfix">
                {{ $filials->links() }}
              </div>
          </div>
  </div>
@stop

@section('css')
    
@stop

@section('js')
    @include('parciais.alert')
@stop