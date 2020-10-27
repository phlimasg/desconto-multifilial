@extends('adminlte::page')

@section('title', empty($processo->nome) ? 'Adicionar Processo' : $processo->nome)

@section('content_header')
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          @if (!empty($processo))
          <h1>Editar - {{$processo->nome}}</h1>
          @else
          <h1>Adicionar Processo</h1>
          @endif
        </div>        
      </div>
    </div><!-- /.container-fluid -->  
@stop

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Preencha os campos e cadastre um novo processo</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
          @include('admin.processo.parciais.form')        
      </div>
    </div>
  </div>
@stop

@section('css')
 
@stop

@section('js')
  @include('parciais.alert')
@stop