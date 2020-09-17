@extends('layout.publico')

@section('title', 'Filiação')

@section('content_header')
    
@stop

@section('content')
<div class="container-fluid" id="conteudo">
  <form action="{{ route('pRespFin.update', ['filial'=>$filial,'processo'=>$processo->id,'pRespFin'=>$aluno]) }}" method="post">
    @csrf
    @method('put')
  <input type="hidden" name="processo_id" value="{{ $processo->id}}">
    <h3>Dados do Responsável Financeiro</h3>
    <h5>Dados da Mãe</h5>
    <div class="row">      
      <div class="col-sm-6">
        <label for="">Nome da Mãe:</label>
        <input type="text" name="nome" id="" class="form-control" placeholder="" value="{{old('nome') ? old('nome') : $dados->nome}}">
        @error('nome')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-3">
        <label for="">Vinculo com aluno:</label>
        <select name="resp_vinculo" id="" class="form-control">
          <option value=""></option>
          <option value="É o(a) próprio(a) aluno(a)" {{old('resp_vinculo')=="É o(a) próprio(a) aluno(a)" ? 'selected': ''}}>É o(a) próprio(a) aluno(a)</option>
          <option value="Pai" {{old('resp_vinculo')=="Pai" ? 'selected': ''}}>Pai</option>
          <option value="Mãe" {{old('resp_vinculo')=="Mãe" ? 'selected': ''}}>Mãe</option>
          <option value="Responsável/Tutor" {{old('resp_vinculo')=="Responsável/Tutor" ? 'selected': ''}}>Responsável/Tutor</option>
          <option value="Outro" {{old('resp_vinculo')=="Outro" ? 'selected': ''}}>Outro</option>
        </select>
        @error('resp_vinculo')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2">
        <label for="">Nacionalidade:</label>
        <input type="text" name="nacionalidade" id="" class="form-control" placeholder="País" value="{{old('nacionalidade') ? old('nacionalidade') : $dados->nacionalidade}}">
        @error('nacionalidade')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-2">
        <label for="">Naturalidade:</label>
        <input type="text" name="naturalidade" id="" class="form-control" placeholder="Cidade" value="{{old('naturalidade') ? old('naturalidade') : $dados->naturalidade}}">
        @error('naturalidade')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>      
      <div class="col-sm-3">
        <label for="">Data de Nascimento:</label>
        <input type="date" name="dt_nasc" id="" class="form-control" placeholder="" min="1920-01-01" value="{{old('dt_nasc') ? old('dt_nasc') : $dados->dt_nasc}}">
        @error('dt_nasc')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>    
      <div class="col-sm-2">
        <label for="">Telefone:</label>
        <input type="text" name="telefone" id="" class="form-control" placeholder="" data-mask="(00)0000-0000" value="{{old('telefone') ? old('telefone') : $dados->telefone}}">    
        @error('telefone')
          <span class="text-danger">{{$message}}</span>
        @enderror    
      </div>    
      <div class="col-sm-3">
        <label for="">Celular:</label>
        <input type="text" name="celular" id="" class="form-control" placeholder="" data-mask="(00)#0000-0000" value="{{old('celular') ? old('celular') : $dados->celular}}">    
        @error('celular')
          <span class="text-danger">{{$message}}</span>
        @enderror    
      </div>    
    </div>

    <div class="row">
      <div class="col-sm-2">
        <label for="">CPF:</label>
        <input type="text" name="cpf" id="" class="form-control" placeholder="" data-mask="000.000.000-00" value="{{old('cpf') ? old('cpf') : $dados->cpf}}">
        @error('cpf')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-2">
        <label for="">RG:</label>
        <input type="text" name="rg" id="" class="form-control" placeholder="" data-mask="########0" value="{{old('rg') ? old('rg') : $dados->rg}}">
        @error('rg')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-2">
        <label for="">Orgão Emissor:</label>
        <input type="text" name="orgao_emissor" id="" class="form-control" placeholder="" value="{{old('orgao_emissor') ? old('orgao_emissor') : $dados->orgao_emissor}}">
        @error('orgao_emissor')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-3">
        <label for="">Data de Emissão:</label>
        <input type="date" name="dt_emissor" id="" class="form-control" placeholder="" min="1920-01-01" value="{{old('dt_emissor') ? old('dt_emissor') : $dados->dt_emissor}}">
        @error('dt_emissor')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-2">
        <label for="">Estado Civil:</label>
        <input type="text" name="estado_civil" id="" class="form-control" placeholder="" min="1920-01-01" value="{{old('estado_civil') ? old('estado_civil') : $dados->estado_civil}}">
        @error('estado_civil')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div> 
    </div>

  <div class="row">
      <div class="col-sm-2">
        <label for="">Escolaridade:</label>
        <input type="text" name="escolaridade" id="" class="form-control" placeholder="" data-mask="000.000.000-00" value="{{old('escolaridade') ? old('escolaridade') : $dados->escolaridade}}">
        @error('escolaridade')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-2">
        <label for="">Profissão:</label>
        <input type="text" name="profissao" id="" class="form-control" placeholder="" data-mask="########0" value="{{old('profissao') ? old('profissao') : $dados->profissao}}">
        @error('profissao')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-4">
        <label for="">Email:</label>
        <input type="email" name="email" id="" class="form-control" placeholder="" value="{{old('email') ? old('email') : $dados->email}}">
        @error('email')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div>

    @include('publico.aluno.parciais.endereco')
   
    
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