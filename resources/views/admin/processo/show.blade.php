@extends('adminlte::page')

@section('title', 'Filiais')

@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
    <h1>Processos - {{$processo->nome}}</h1>
    </div>    
  </div>
</div><!-- /.container-fluid --> 
@stop

@section('content')

  <div class="card card-gray-dark">
    <div class="card-header border-0">                
        <h3 class="card-title">Informações sobre o processo:</h3>
        <div class="card-tools">
          <a href="{{ route('processos.edit', ['filial'=> $filial->url,'processo'=> $processo->url]) }}" class="btn btn-sm btn-danger"><i class="fa fa-pen"></i> Editar Processo</a>            
        </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-3">
          <label for="">Nome: </label> {{$processo->nome}}
        </div>
        <div class="col-sm-3">
          <label for="">Tipo de desconto: </label> {{$processo->tipo}}
        </div>
        <div class="col-sm-6">
          <label for="">Email de contatos e respostas: </label> {{$processo->email}}
        </div>
        
      </div>
      <div class="row">
        <div class="col-sm-3">
          <label for="">Inicia em: </label> {{date('d/m/Y H:i',strtotime($processo->periodo_ini))}}
        </div>
        <div class="col-sm-3">
          <label for="">Encerra em: </label> {{date('d/m/Y H:i',strtotime($processo->periodo_fim))}}
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <label for="">Criado por: </label> {{$processo->user_create}} em {{date('d/m/Y H:i',strtotime($processo->created_at))}}
        </div>
      </div>
    </div>
  </div>
  

  <div class="card card-navy">
    <div class="card-header border-0">                
        <h3 class="card-title">Opções do processo:</h3>
        <div class="card-tools">
          <a href="#" data-toggle="modal" data-target="#opcoes" class="btn btn-sm btn-danger"><i class="fa fa-pen"></i> Adicionar Opções</a>            
        </div>
    </div>
    <div class="card-body table-responsive mt-1">
      <table class="table table-striped table-valign-middle" id="table">
        <thead>
        <tr>
          <th>Renda Inic.</th>
          <th>Renda Fin.</th>
          <th>Percentual</th>
          <th>Vagas</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($processo->Opcoes as $i)
        <tr>
          <td>
            {{$i->renda_ini}}
          </td>
          <td>{{$i->renda_fim}}</td>
          <td>
            {{$i->percentual}}
          </td>
          <td>
            {{$i->vagas}}
          </td>
          <td>
            <form action="{{ route('processoOpcoes.destroy', ['filial'=>$filial->url,'processo'=>$processo->url,'processoOpco'=> $i->id]) }}" method="post">
              @method('delete') @csrf
              <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
            Nenhuma opção adicionada
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
  @include('admin.processo.parciais.mdOpcoes')   
@stop

@section('css')
    
@stop

@section('js')
@include('parciais.alert')
@if ($errors->any())
    <script>
      $('#opcoes').modal('show')
    </script>
@endif
<script>
  $(document).ready(function() {
    $('#table').DataTable({
      "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"
      }
    });        
  });
</script>
@stop