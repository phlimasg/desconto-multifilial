@extends('layout.publico')

@section('title', 'Filiação')

@section('content_header')
    
@stop

@section('content')
<div class="container-fluid" id="conteudo">
  <a href="#"  data-toggle="modal" data-target="#addVeiculo" class="btn btn-primary" style="float: right"><i class="fa fa-plus"></i> Adicionar</a>
  <h3>Bens Móveis</h3>

  <!-- The Modal -->
  <div class="modal fade" id="addVeiculo">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="{{ route('pVeiculos.store', ['filial'=>$filial,'processo'=>$processo->id,'pVeiculos'=>$aluno]) }}" method="post">
          @csrf
          <input type="hidden" name="public_resp_fin_id" value="{{$dados->pResponsavelFinanceiro->id}}">
          <input type="hidden" name="public_aluno_id" value="{{$aluno}}">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Adicionar Veículo</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-3">
                <label for="">Fabricante</label>
                <input type="text" name="veiculo_fabricante" id="" class="form-control">
                @error('veiculo_fabricante')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="col-sm-3">
                <label for="">Modelo</label>
                <input type="text" name="veiculo_modelo" id="" class="form-control">
                @error('veiculo_modelo')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="col-sm-3">
                <label for="">Ano</label>
                <input type="text" name="veiculo_ano" id="" class="form-control" data-mask="0000">
                @error('veiculo_ano')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="col-sm-3">
                <label for="">Placa</label>
                <input type="text" name="veiculo_placa" id="" class="form-control" data-mask="SSS-0A00">
                @error('veiculo_placa')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            </div>
          </div>
    
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-block">Adicionar veículo</button>
          </div>
        </div>    
      </form>  
      
    </div>
  </div>
  <hr>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Fabricante</th>
          <th>Modelo</th>
          <th>Ano</th>
          <th>Placa</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($veiculos as $i)
        <tr>
        <td>{{$i->veiculo_fabricante}}</td>
        <td>{{$i->veiculo_modelo}}</td>
        <td>{{$i->veiculo_ano}}</td>
        <td>{{$i->veiculo_placa}}</td>
        <td style="max-width: 60px">
          <form action="{{ route('pVeiculos.destroy', ['filial'=>$filial,'processo'=>$processo->id,'pVeiculo'=>$i->id]) }}" method="post">
            @method('delete')
            @csrf
            <input type="hidden" name="veiculo_id" value="{{$i->id}}">
            <button type="submit" class="btn btn-danger btn-block">
              <i class="fa fa-trash"></i> Remover
            </button>
          </form>
        </td>
        </tr>
        @empty
            Nenhum veículo cadastrado
        @endforelse
      </tbody>
    </table>
  </div>

    <hr>
    <div class="row">
      <div class="col-sm-12">
        <a href="{{ route('pDespesasEReceitas.show', 
          ['filial'=>$filial,'processo'=>$processo->url,'pDespesasEReceita'=>$aluno]) }}" class="btn btn-block btn-danger btn-lg"><i class="fa fa-floppy-o"></i> Salvar Dados</a>
      </div>  
    </div>

</div>

    
</div>
@stop

@section('css')

@stop

@section('js')
    
@stop