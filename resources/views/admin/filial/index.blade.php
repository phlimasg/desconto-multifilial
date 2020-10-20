@extends('adminlte::page')

@section('title', 'Filiais')

@section('content_header')
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Listagem de Filiais</h1>
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
    <div class="col-12">
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
        <!-- /.card-header -->
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
              <tr>
                <td>{{$i->id}}</td>
                <td>{{$i->codigo}}</td>
                <td>{{$i->nome}}</td>
                <td>{{$i->descricao}}</td>
                <td><a href="{{ route('filial.show', ['filial'=> $i->id]) }}" class="btn"><i class="fa fa-edit"></i> </a></td>
                <td><a href="{{ route('processos.index', ['filial'=> $i->url]) }}" class="btn btn-primary"><i class="fa fa-eye "></i> Processos</a></td>
              </tr> 
              @endforeach             
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->

        <div class="card-footer clearfix">
            {{ $filials->links() }}
          </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
@stop

@section('css')
    
@stop

@section('js')
    @include('parciais.alert')
@stop