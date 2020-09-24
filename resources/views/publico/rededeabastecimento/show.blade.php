@extends('layout.publico')

@section('title', 'Filiação')

@section('content_header')
    
@stop

@section('content')
<div class="container-fluid" id="conteudo">
  <form action="{{ route('pRedeDeAbastecimento.update', ['filial'=>$filial,'processo'=>$processo->id,'pRedeDeAbastecimento'=>$aluno]) }}" method="post">
    @csrf    
    @method('put')
    <h3>Rede de Abastecimento</h3>
    <div class="row"> 
      <div class="col-sm-3">
        <label for="">A localidade da moradia possui rede de esgoto?</label>
        <select name="esgoto" id="" class="form-control">
          <option value=""></option>
          <option value="Sim" {{$dados->esgoto == "Sim" || old('esgoto')=="Sim" ? 'selected': ''}}>Sim</option>
          <option value="Não" {{$dados->esgoto == "Não" || old('esgoto')=="Não" ? 'selected': ''}}>Não</option>
        </select>
        @error('esgoto')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-3">
        <label for="">A moradia possui itens de instalação sanitaria?</label>
        <select name="sanitaria" id="" class="form-control">
          <option value=""></option>
          <option value="Sim" {{$dados->sanitaria == "Sim" || old('sanitaria')=="Sim" ? 'selected': ''}}>Sim</option>
          <option value="Não" {{$dados->sanitaria == "Não" || old('sanitaria')=="Não" ? 'selected': ''}}>Não</option>
        </select>
        @error('sanitaria')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-3">
        <label for="">Como é o abastecimento de água no local?</label>
        <select name="agua" id="" class="form-control">
          <option value=""></option>
          <option value="Água encanada" {{$dados->agua == "Água encanada" || old('agua')=="Água encanada" ? 'selected': ''}}>Água encanada</option>
          <option value="Poço" {{$dados->agua == "Poço" || old('agua')=="Poço" ? 'selected': ''}}>Poço</option>
          <option value="Outro" {{$dados->agua == "Outro" || old('agua')=="Outro" ? 'selected': ''}}>Outro</option>
        </select>
        @error('agua')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

      <div class="col-sm-3">
        <label for="">Como é abastecimento por energia elétrica?</label>
        <select name="energia" id="" class="form-control">
          <option value=""></option>
          <option value="Energia Elétrica Regularizada" {{$dados->energia == "Energia Elétrica Regularizada" || old('energia')=="Energia Elétrica Regularizada" ? 'selected': ''}}>Casa</option>
          <option value="Energia Solar" {{$dados->energia == "Energia Solar" || old('energia')=="Energia Solar" ? 'selected': ''}}>Energia Solar</option>                   
          <option value="Outro" {{$dados->energia == "Outro" || old('energia')=="Outro" ? 'selected': ''}}>Outro</option>  
        </select>
        @error('energia')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div>     
    <hr>
    <div class="row">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-block btn-danger btn-lg"><i class="fa fa-floppy-o"></i> Salvar Dados</button>
      </div>
    </div>    
  </form>  
  </div>
    
</div>
@stop

@section('css')

@stop

@section('js')
    
@stop