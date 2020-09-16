@extends('adminlte::page')

@section('title', 'Filiais')

@section('content_header')
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Adicionar Filial</h1>
        </div>        
      </div>
    </div><!-- /.container-fluid -->  
@stop

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Preencha os campos e crie uma nova filial</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @include('admin.filial.parciais.form',
        $data = [
          'rota' => "filial.update",
          'metodo' => "PUT",
          'filial' => $filial
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