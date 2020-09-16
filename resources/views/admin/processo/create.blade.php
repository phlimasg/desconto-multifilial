@extends('adminlte::page')

@section('title', 'Filiais')

@section('content_header')
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Adicionar Usuário</h1>
        </div>        
      </div>
    </div><!-- /.container-fluid -->  
@stop

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Preencha os campos e cadastre um novo usuário</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @include('admin.processo.parciais.form',
        $data = [
          'rota' => "processos.store",
          'filial' => $filial,
          'metodo' => "post",
          'input' => null
        ])
      </div>
    </div>
  </div>
@stop

@section('css')
 
@stop

@section('js')
  @include('parciais.alert')
@stop