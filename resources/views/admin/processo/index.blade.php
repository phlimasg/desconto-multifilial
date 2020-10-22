@extends('adminlte::page')

@section('title', 'Processos')

@section('content_header')
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Listagem de Processos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <a href="{{ route('processos.create',['filial'=> $filial]) }}" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Processo</a>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->  
@stop

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Processos cadastrados</h3>

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
                <th>Nome</th>
                <th>Inicio</th>
                <th>Fim</th>                
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $i)
              <tr>
                <td>{{$i->id}}</td>
                <td>{{$i->nome}}</td>
                <td>{{date('d/m/Y H:i',strtotime($i->periodo_ini))}}</td>
                <td>{{date('d/m/Y H:i',strtotime($i->periodo_fim))}}</td>                
                <td><a href="{{ route('processos.show', ['filial'=> $filial,'processo'=> $i->url]) }}" class="btn btn-primary"><i class="fa fa-pen"></i> Editar</a></td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-cog"></i> Opções
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('analisar.index', ['filial'=> $filial->url,'processo'=> $i->url]) }}"><i class="fa fa-eye"></i> Analisar</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Alunos adicionados</a>                      
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalImportar{{$i->id}}"><i class="fa fa-file-excel"></i> Importar Alunos</a>
                      <a class="dropdown-item" href="#"><i class="fa fa-graduation-cap"></i> Adicionar Aluno</a>
                    </div>
                  </div>                  
                </td>
              </tr>
              <div class="modal fade" id="modalImportar{{$i->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <form action="{{ route('alunos.importar', ['filial'=>$filial,'processo' => $i->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <input type="hidden" name="processo_id" value="{{$i->id}}">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Importação de alunos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-sm-12">
                            <p>Importar alunos para o processo: <b>{{$i->nome}}</b></p>
                            <p>Baixe <a href="{{ asset('modelo/alunos.xlsx') }}" download>aqui</a> um exemplo de documento para importar.</p>
                            <small class="text-danger">*Somente o RA é obrigatório</small><br>
                            <small class="text-danger">**Remova a primeira linha do documento antes da importação.</small> <br>
                            <small class="text-danger">***Crie um novo arquivo.</small>
                          </div>
                        </div>
                        <input type="file" name="arquivo" id="" class="form-control">
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Importar alunos</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div> 
              @endforeach             
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->

        <div class="card-footer clearfix">
            {{ $data->links() }}
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