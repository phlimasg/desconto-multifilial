@extends('layout.publico')

@section('title', 'Filiação')

@section('content_header')
    
@stop

@section('content')
<div class="container-fluid" id="conteudo">
  <form action="{{ route('pFiliacao.update', ['filial'=>$filial,'processo'=>$processo->id,'pFiliacao'=>$aluno]) }}" method="post">
    @csrf
    @method('put')
  <input type="hidden" name="processo_id" value="{{ $processo->id}}">
    <h3>Dados da Filiação</h3>
    <h5>Dados da Mãe</h5>
    <div class="row">      
      <div class="col-sm-6">
        <label for="">Nome da Mãe:</label>
        <input type="text" name="mae_nome" id="" class="form-control" placeholder="" value="{{old('mae_nome') ? old('mae_nome') : $dados->mae_nome}}">
        @error('mae_nome')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-3">
        <label for="">Situação:</label>
        <select name="mae_tipo_guarda" id="" class="form-control">
          <option value=""></option>
          <option value="Reside com o(a) aluno(a)" {{old('mae_tipo_guarda')=="Reside com o(a) aluno(a)" ? 'selected': ''}}>Reside com o(a) aluno(a)</option>
          <option value="Falecida" {{old('mae_tipo_guarda')=="Falecida" ? 'selected': ''}}>Falecida</option>
          <option value="Separada do genitor" {{old('mae_tipo_guarda')=="Separada do genitor" ? 'selected': ''}}>Separada do genitor</option>
          <option value="Guarda compartilhada" {{old('mae_tipo_guarda')=="Guarda compartilhada" ? 'selected': ''}}>Guarda compartilhada</option>
          <option value="Outro" {{old('mae_tipo_guarda')=="Outro" ? 'selected': ''}}>Outro</option>
        </select>
        @error('mae_tipo_guarda')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2">
        <label for="">CPF:</label>
        <input type="text" name="mae_cpf" id="" class="form-control" placeholder="" data-mask="000.000.000-00" value="{{old('mae_cpf') ? old('mae_cpf') : $dados->mae_cpf}}">
        @error('mae_cpf')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-2">
        <label for="">RG:</label>
        <input type="text" name="mae_rg" id="" class="form-control" placeholder="" data-mask="########0" value="{{old('mae_rg') ? old('mae_rg') : $dados->mae_rg}}">
        @error('mae_rg')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-3">
        <label for="">Data de Nascimento:</label>
        <input type="date" name="mae_dt_nasc" id="" class="form-control" placeholder="" min="1920-01-01" value="{{old('mae_dt_nasc') ? old('mae_dt_nasc') : $dados->mae_dt_nasc}}">
        @error('mae_dt_nasc')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>    
      <div class="col-sm-3">
        <label for="">Telefone:</label>
        <input type="text" name="mae_telefone" id="" class="form-control" placeholder="" data-mask="(00)#0000-0000" value="{{old('mae_elefone') ? old('mae_telefone') : $dados->mae_telefone}}">    
        @error('mae_telefone')
          <span class="text-danger">{{$message}}</span>
        @enderror    
      </div> 
    </div>

    <h5>Dados do Pai</h5>
    <div class="row">      
      <div class="col-sm-6">
        <label for="">Nome da Pai:</label>
        <input type="text" name="pai_nome" id="" class="form-control" placeholder="" value="{{old('pai_nome') ? old('pai_nome') : $dados->pai_nome}}">
        @error('pai_nome')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-3">
        <label for="">Situação:</label>
        <select name="pai_tipo_guarda" id="" class="form-control">
          <option value=""></option>
          <option value="Reside com o(a) aluno(a)" {{old('pai_tipo_guarda')=="Reside com o(a) aluno(a)" ? 'selected': ''}}>Reside com o(a) aluno(a)</option>
          <option value="Falecida" {{old('pai_tipo_guarda')=="Falecida" ? 'selected': ''}}>Falecida</option>
          <option value="Separada do genitor" {{old('pai_tipo_guarda')=="Separada do genitor" ? 'selected': ''}}>Separada do genitor</option>
          <option value="Guarda compartilhada" {{old('pai_tipo_guarda')=="Guarda compartilhada" ? 'selected': ''}}>Guarda compartilhada</option>
          <option value="Outro" {{old('pai_tipo_guarda')=="Outro" ? 'selected': ''}}>Outro</option>
        </select>
        @error('pai_tipo_guarda')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2">
        <label for="">CPF:</label>
        <input type="text" name="pai_cpf" id="" class="form-control" placeholder="" data-mask="000.000.000-00" value="{{old('pai_cpf') ? old('pai_cpf') : $dados->pai_cpf}}">
        @error('pai_cpf')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-2">
        <label for="">RG:</label>
        <input type="text" name="pai_rg" id="" class="form-control" placeholder="" data-mask="########0" value="{{old('pai_rg') ? old('pai_rg') : $dados->pai_rg}}">
        @error('pai_rg')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-3">
        <label for="">Data de Nascimento:</label>
        <input type="date" name="pai_dt_nasc" id="" class="form-control" placeholder="" min="1920-01-01" value="{{old('pai_dt_nasc') ? old('pai_dt_nasc') : $dados->dt_emissor}}">
        @error('pai_dt_nasc')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>    
      <div class="col-sm-3">
        <label for="">Telefone:</label>
        <input type="text" name="pai_telefone" id="" class="form-control" placeholder="" data-mask="(00)#0000-0000" value="{{old('pai_telefone') ? old('pai_telefone') : $dados->telefone}}">    
        @error('pai_telefone')
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
@stop

@section('css')

@stop

@section('js')
    
@stop