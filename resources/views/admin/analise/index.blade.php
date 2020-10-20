@extends('adminlte::page')

@section('title', 'Processos')

@section('content_header')
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Listagem de Processos</h1>
        </div>
        <!--<div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Processo</a>
          </ol>
        </div>/.container-fluid --> 
      </div>
    </div>  
@stop

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body" >
          <table class="table table-hover" id="tabela">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Status</th>
                <th>Concedido</th>                
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $i)
              <tr>
                <td>{{$i->id}}</td>
                <td>{{$i->nome}}</td>
                <td>{{$i->status}}</td>
                <td>{{$i->desconto_deferido}}</td>                
                <td><a href="{{ route('analisar.show', ['filial'=>$filial->url,'processo'=>$processo->url,'analisar'=>$i->id]) }}" class="btn btn-primary"><i class="fa fa-eye"></i> Analisar</a></td>
                <td>                 
                </td>
              </tr>              
              @endforeach             
            </tbody>            
          </table>
        </div>
        <!-- /.card-body -->

        
      </div>
      <!-- /.card -->
    </div>
  </div>
@stop

@section('css')
@stop

@section('js')
    @include('parciais.alert')
    <script type="text/javascript" class="init">
      $(document).ready(function() {
        $('#tabela').DataTable();
      });
    </script>
@stop