@extends('adminlte::page')

@section('title', 'Solicitação')

@section('content_header')

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1><a href="{{ route('analisar.index', ['filial'=> $filial->url,'processo'=> $processo->url]) }}" class="btn btn-sm btn-dark"><i class="fa fa-chevron-left"></i></a>Dados da Solicitação</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">            
            <div class="btn-group">
              <div class="btn-group">
              <button type="button" data-toggle="modal" data-target="#alterarStatus"  class="btn btn-block btn-warning"><i class="fa fa-plus"></i> Alterar Status e Parecer descritivo</button>
              
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                   <i class="fa fa-envelope"></i> Mensagens
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#mdMsgUsuario">Mensagens para o usuário</a>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#mdMsgInterna">Mensagens Internas</a>
                </div>
              </div>
            </div>
            @include('admin.analise.parciais.mdMsgUsuario')
            @include('admin.analise.parciais.mdMsgInterna')
            @include('admin.analise.parciais.mdAlterarStatus')
            @include('admin.analise.parciais.mdHistorico')
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->  
@stop

@section('content')

<div class="row">
  <div class="col-12 col-sm-12">
    <div class="card card-navy card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
          <!--<li class="pt-2 px-3"><h3 class="card-title">{{$dados->nome}}</h3></li>-->
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true"><i class="fa fa-user"></i> Candidato</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false"> <i class="fa fa-users"></i> Filiação</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false"> <i class="fa fa-money-bill-alt"></i> Resp. Fin.</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill" href="#custom-tabs-two-settings" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false"> <i class="fa fa-home"></i> Comp. Fam.</a>
          </li>          
          @if($processo->tipo == 'bolsa')
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-two-hab-tab" data-toggle="pill" href="#custom-tabs-two-hab" role="tab" aria-controls="custom-tabs-two-hab" aria-selected="false"> <i class="fa fa-igloo"></i> Sit. Habit.</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-two-redeabast-tab" data-toggle="pill" href="#custom-tabs-two-redeabast" role="tab" aria-controls="custom-tabs-two-redeabast" aria-selected="false"> <i class="fa fa-water"></i> Rede de Abast.</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-two-bensmoveis-tab" data-toggle="pill" href="#custom-tabs-two-bensmoveis" role="tab" aria-controls="custom-tabs-two-bensmoveis" aria-selected="false"> <i class="fa fa-car"></i> Bens Móveis</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-two-desperec-tab" data-toggle="pill" href="#custom-tabs-two-desperec" role="tab" aria-controls="custom-tabs-two-desperec" aria-selected="false"> <i class="fa fa-dollar-sign"></i> Desp. e Rec.</a>
          </li>
          @endif
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-two-tabContent">
          <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
             @include('admin.analise.parciais.candidato')
          </div>
          <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
            @include('admin.analise.parciais.filiacao')
          </div>
          <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
            @include('admin.analise.parciais.respfin')
          </div>
          <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
            @include('admin.analise.parciais.compfam')
          </div>
          @if($processo->tipo == 'bolsa')
          <div class="tab-pane fade" id="custom-tabs-two-hab" role="tabpanel" aria-labelledby="custom-tabs-two-hab-tab">
            @include('admin.analise.parciais.sithabit')
          </div>
          <div class="tab-pane fade" id="custom-tabs-two-redeabast" role="tabpanel" aria-labelledby="custom-tabs-two-redeabast-tab">
            @include('admin.analise.parciais.redeabast')
          </div>
          @endif
            <div class="tab-pane fade" id="custom-tabs-two-bensmoveis" role="tabpanel" aria-labelledby="custom-tabs-two-bensmoveis-tab">
              @include('admin.analise.parciais.bensmoveis')
            </div>          
            <div class="tab-pane fade" id="custom-tabs-two-desperec" role="tabpanel" aria-labelledby="custom-tabs-two-desperec-tab">
              @include('admin.analise.parciais.desperec')
            </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
  @include('parciais.alert')
@stop