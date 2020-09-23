@extends('layout.publico')

@section('title', 'Filiação')

@section('content_header')
    
@stop

@section('content')
<div class="container-fluid" id="conteudo">
  <div class="btn-group" style="float: right">
    <button type="button" class="btn btn-primary" data-toggle="dropdown"><i class="fa fa-plus"></i> Adicionar itens</button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addReceita">Receita</a>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addDespesa">Despesa</a>
    </div>
  </div>
  <h3>Receitas Agregadas</h3>
    @include('publico.despesasereceitas.parciais.modalreceitas')
    @include('publico.despesasereceitas.parciais.modaldespesas')
  <hr>
  <p>Receitas adicionadas</p>
  
  @forelse ($despesas as $i)
      @if ($i->tipo == 'receita')
          <div class="card" style="background-color: lightblue">
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Observação</th>          
                    <th style="width: 150px"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <td>{{$i->descricao}}</td>
                  <td>{{$i->valor}}</td>
                  <td>{{$i->observacao}}</td>        
                  <td style="width: 150px">
                    <form action="{{ route('pDespesasEReceitas.destroy', ['filial'=>$filial,'processo'=>$processo->id,'pDespesasEReceita'=>$i->id]) }}" method="post">
                      @method('delete')
                      @csrf
                      <input type="hidden" name="veiculo_id" value="{{$i->id}}">
                      <button type="submit" class="btn btn-danger btn-block">
                        <i class="fa fa-trash"></i> Remover
                      </button>
                    </form>
                  </td>
                  </tr>            
                </tbody>
              </table>
            </div>
            <h5 class="card-title">Documentos adicionados:</h5>
            <div class="row">
              @forelse ($i->pDespesasEReceitasDocumentos()->get() as $j)
              @php
              $doc = true
            @endphp
              <div class="col-sm-2 bg-light">
                <div class="row">
                  <div class="col-sm-12 text-center">
                    @if (strpos($j->nome,'.pdf'))
                      <img src="{{asset('img/pdf.png')}}" alt="" width="100%">                            
                    @else
                    <img src="{{Storage::url($j->url)}}" alt="" style="max-height: 136px; max-width: 100%;">
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 text-center">
                    {{mb_strimwidth($j->nome,0,15,'...')}}
                  </div>
                </div>
                <!--
                <div class="row">
                  <div class="col-sm-12">
                    <form action="" method="post">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-trash"></i></button>                          
                    </form>
                  </div>
                </div>-->              
              </div>
              @empty
              Nenhum documento adicionado
              @endforelse
            </div>
          </div>
            
          </div> 
          <hr> 
          @endif
          @empty
              Nada adicionado
          @endforelse
<hr>
  <h3>Despesas</h3>
<hr>
@forelse ($despesas as $i)
@if ($i->tipo == 'despesa')
    <div class="card" style="background-color: lightcoral">
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Descrição</th>
              <th>Valor</th>
              <th>Observação</th>          
              <th style="width: 150px"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <td>{{$i->descricao}}</td>
            <td>{{$i->valor}}</td>
            <td>{{$i->observacao}}</td>        
            <td style="width: 150px">
              <form action="{{ route('pDespesasEReceitas.destroy', ['filial'=>$filial,'processo'=>$processo->id,'pDespesasEReceita'=>$i->id]) }}" method="post">
                @method('delete')
                @csrf
                <input type="hidden" name="veiculo_id" value="{{$i->id}}">
                <button type="submit" class="btn btn-danger btn-block">
                  <i class="fa fa-trash"></i> Remover
                </button>
              </form>
            </td>
            </tr>            
          </tbody>
        </table>
      </div>
      <h5 class="card-title">Documentos adicionados:</h5>
      <div class="row">
        @forelse ($i->pDespesasEReceitasDocumentos()->get() as $j)
        @php
        $doc = true
      @endphp
        <div class="col-sm-2 bg-light">
          <div class="row">
            <div class="col-sm-12 text-center">
              @if (strpos($j->nome,'.pdf'))
                <img src="{{asset('img/pdf.png')}}" alt="" width="100%">                            
              @else
              <img src="{{Storage::url($j->url)}}" alt="" style="max-height: 136px; max-width: 100%;">
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 text-center">
              {{mb_strimwidth($j->nome,0,15,'...')}}
            </div>
          </div>
          <!--
          <div class="row">
            <div class="col-sm-12">
              <form action="" method="post">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-trash"></i></button>                          
              </form>
            </div>
          </div>-->              
        </div>
        @empty
        Nenhum documento adicionado
        @endforelse
      </div>
    </div>
      
    </div> 
    <hr> 
    @endif
    @empty
        Nada adicionado
    @endforelse  

    <hr>
    <div class="row">
      <div class="col-sm-12">
        <button type="" class="btn btn-block btn-danger btn-lg"><i class="fa fa-floppy-o"></i> Salvar Dados</button>
      </div>  
    </div>

</div>

    
</div>
@stop

@section('css')

@stop

@section('js')
<script>
  $('#formdespesas').submit(function(){
    $('#btndespesas').prop('disabled', true);
  });
  $('#formreceitas').submit(function(){
    $('#btnreceitas').prop('disabled', true);
  });  
</script>  
@stop