@extends('layout.publico')

@section('title', 'Filiação')

@section('content_header')
    
@stop

@section('content')
<div class="container-fluid" id="conteudo">
  <form action="{{ route('pSituacaoHabitacional.update', ['filial'=>$filial,'processo'=>$processo->id,'pSituacaoHabitacional'=>$aluno]) }}" method="post">
    @csrf    
    @method('put')
    <h3>Situação Habitacional</h3>
    <div class="row"> 
      <div class="col-sm-3">
        <label for="">Está localizada em área:</label>
        <select name="tipo_habitacao" id="" class="form-control">
          <option value=""></option>          
          <option value="Urbana" {{$dados->tipo_habitacao == "Urbana" || old('tipo_habitacao')=="Urbana" ? 'selected': ''}}>Urbana</option>
          <option value="Rural" {{$dados->tipo_habitacao == "Rural" || old('tipo_habitacao')=="Rural" ? 'selected': ''}}>Rural</option>
        </select>
        @error('tipo_habitacao')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-3">
        <label for="">Quantidade de cômodos:</label>
        <select name="tipo_habitacao_comodos" id="" class="form-control">
          <option value=""></option>
          <option value="1" {{$dados->tipo_habitacao_comodos == "1" || old('tipo_habitacao_comodos')=="1" ? 'selected': ''}}>1</option>
          <option value="2" {{$dados->tipo_habitacao_comodos == "2" || old('tipo_habitacao_comodos')=="2" ? 'selected': ''}}>2</option>
          <option value="3" {{$dados->tipo_habitacao_comodos == "3" || old('tipo_habitacao_comodos')=="3" ? 'selected': ''}}>3</option>
          <option value="4" {{$dados->tipo_habitacao_comodos == "4" || old('tipo_habitacao_comodos')=="4" ? 'selected': ''}}>4</option>
          <option value="5" {{$dados->tipo_habitacao_comodos == "5" || old('tipo_habitacao_comodos')=="5" ? 'selected': ''}}>5 ou mais</option>
        </select>
        @error('tipo_habitacao_comodos')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-3">
        <label for="">Tipo de moradia:</label>
        <select name="tipo_moradia" id="" class="form-control">
          <option value=""></option>
          <option value="Alvenaria" {{$dados->tipo_moradia == "Alvenaria" || old('tipo_moradia')=="Alvenaria" ? 'selected': ''}}>Alvenaria</option>
          <option value="Mista" {{$dados->tipo_moradia == "Mista" || old('tipo_moradia')=="Mista" ? 'selected': ''}}>Mista</option>
          <option value="Madeira" {{$dados->tipo_moradia == "Madeira" || old('tipo_moradia')=="Madeira" ? 'selected': ''}}>Madeira</option>
          <option value="Edifício" {{$dados->tipo_moradia == "Edifício" || old('tipo_moradia')=="Edifício" ? 'selected': ''}}>Edifício</option>
          <option value="Barraco" {{$dados->tipo_moradia == "Barraco" || old('tipo_moradia')=="Barraco" ? 'selected': ''}}>Barraco</option>
          <option value="Pau a pique" {{$dados->tipo_moradia == "Pau a pique" || old('tipo_moradia')=="Pau a pique" ? 'selected': ''}}>Pau a pique</option>
          <option value="Palafita" {{$dados->tipo_moradia == "Palafita" || old('tipo_moradia')=="Palafita" ? 'selected': ''}}>Palafita</option>
        </select>
        @error('tipo_habitacao')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

      <div class="col-sm-3">
        <label for="">A familia reside em:</label>
        <select name="tipo_residencia" id="" class="form-control">
          <option value=""></option>
          <option value="Casa" {{$dados->tipo_residencia == "Casa" || old('tipo_residencia')=="Casa" ? 'selected': ''}}>Casa</option>
          <option value="Apartamento" {{$dados->tipo_residencia == "Apartamento" || old('tipo_residencia')=="Apartamento" ? 'selected': ''}}>Apartamento</option>
          <option value="Comunidade" {{$dados->tipo_residencia == "Comunidade" || old('tipo_residencia')=="Comunidade" ? 'selected': ''}}>Comunidade</option>          
          <option value="Outro" {{$dados->tipo_residencia == "Outro" || old('tipo_residencia')=="Outro" ? 'selected': ''}}>Outro</option>  
        </select>
        @error('tipo_residencia')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div>
    <div class="row">      
      <div class="col-sm-3">
        <label for="">Quanto tempo reside no mesmo local:</label>
        <select name="tempo_moradia" id="" class="form-control">
          <option value=""></option>
          <option value="De 1 mês a 2 anos" {{$dados->tempo_moradia == "De 1 mês a 2 anos" || old('tempo_moradia')=="De 1 mês a 2 anos" ? 'selected': ''}}>De 1 mês a 2 anos</option>
          <option value="De 2 a 5 anos" {{$dados->tempo_moradia == "De 2 a 5 anos" || old('tempo_moradia')=="De 2 a 5 anos" ? 'selected': ''}}>De 2 a 5 anos</option>
          <option value="5 anos ou mais" {{$dados->tempo_moradia == "5 anos ou mais" || old('tempo_moradia')=="5 anos ou mais" ? 'selected': ''}}>5 anos ou mais</option>
        </select>
        @error('tempo_moradia')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

      <div class="col-sm-3">
        <label for="">Há outras moradias no mesmo terreno?</label>
        <select name="outras_moradias" id="" class="form-control">
          <option value=""></option>
          <option value="Sim" {{$dados->outras_moradias == "Sim" || old('outras_moradias')=="Sim" ? 'selected': ''}}>Sim</option>
          <option value="Não" {{$dados->outras_moradias == "Não" || old('outras_moradias')=="Não" ? 'selected': ''}}>Não</option>          
        </select>
        @error('outras_moradias')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

      <div class="col-sm-3">
        <label for="">Os moradores da outra moradia tem vinculo familiar?</label>
        <select name="outras_moradias_vinculo" id="" class="form-control">
          <option value=""></option>
          <option value="Sim" {{$dados->outras_moradias_vinculo == "Sim" || old('outras_moradias_vinculo')=="Sim" ? 'selected': ''}}>Sim</option>
          <option value="Não" {{$dados->outras_moradias_vinculo == "Não" || old('outras_moradias_vinculo')=="Não" ? 'selected': ''}}>Não</option> 
        </select>
        @error('outras_moradias_vinculo')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-3">
        <label for="">A familia está inscrita no Cadastro Único?</label>
        <select name="cad_unico" id="" class="form-control">
          <option value=""></option>
          <option value="Sim" {{$dados->cad_unico == "Sim" || old('cad_unico')=="Sim" ? 'selected': ''}}>Sim</option>
          <option value="Não" {{$dados->cad_unico == "Não" || old('cad_unico')=="Não" ? 'selected': ''}}>Não</option> 
        </select>
        @error('cad_unico')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div> 
    <div class="row">
      <div class="col-sm-3">
        <label for="">Condições de moradia</label>
        <select name="condicao_moradia" id="" class="form-control">
          <option value=""></option>
          <option value="Imóvel próprio" {{$dados->condicao_moradia == "Imóvel próprio" || old('condicao_moradia')=="Imóvel próprio" ? 'selected': ''}}>Imóvel próprio</option>
          <option value="Imóvel alugado" {{$dados->condicao_moradia == "Imóvel alugado" || old('condicao_moradia')=="Imóvel alugado" ? 'selected': ''}}>Imóvel alugado</option> 
          <option value="Casa/Ap cedido" {{$dados->condicao_moradia == "Casa/Ap cedido" || old('condicao_moradia')=="Casa/Ap cedido" ? 'selected': ''}}>Casa/Ap cedido</option> 
          <option value="Financiado" {{$dados->condicao_moradia == "Financiado" || old('condicao_moradia')=="Financiado" ? 'selected': ''}}>Financiado</option> 
        </select>
        @error('condicao_moradia')
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