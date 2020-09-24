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
    <div class="row">      
      <div class="col-sm-6">
        <label for="">Nome:</label>
        <input type="text" name="nome" id="" class="form-control" placeholder="" value="{{old('nome') ? old('nome') : $dados->nome}}">
        @error('nome')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-3">
        <label for="">Vinculo com aluno:</label>
        <select name="resp_vinculo" id="" class="form-control">
          <option value=""></option>
          <option value="É o(a) próprio(a) aluno(a)" {{$dados->resp_vinculo == "É o(a) próprio(a) aluno(a)" || old('resp_vinculo')=="É o(a) próprio(a) aluno(a)" ? 'selected': ''}}>É o(a) próprio(a) aluno(a)</option>
          <option value="Pai" {{$dados->resp_vinculo == "Pai" || old('resp_vinculo')=="Pai" ? 'selected': ''}}>Pai</option>
          <option value="Mãe" {{$dados->resp_vinculo == "Mãe" || old('resp_vinculo')=="Mãe" ? 'selected': ''}}>Mãe</option>
          <option value="Responsável/Tutor" {{$dados->resp_vinculo == "Responsável/Tutor" || old('resp_vinculo')=="Responsável/Tutor" ? 'selected': ''}}>Responsável/Tutor</option>
          <option value="Outro" {{$dados->resp_vinculo == "Outro" || old('resp_vinculo')=="Outro" ? 'selected': ''}}>Outro</option>
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
        <select name="estado_civil" id="" class="form-control">
          <option value=""></option>
          <option value="Solteiro(a)" {{$dados->estado_civil == 'Solteiro(a)' ? 'selected' : '' }}>Solteiro(a)</option>
          <option value="Casado(a)" {{$dados->estado_civil == 'Casado(a)' ? 'selected' : '' }}>Casado(a)</option>
          <option value="Divorciado(a)" {{$dados->estado_civil == 'Divorciado(a)' ? 'selected' : '' }}>Divorciado(a) </option>
          <option value="Viúvo(a)" {{$dados->estado_civil == 'Viúvo(a)' ? 'selected' : '' }}>Viúvo(a)</option>
          <option value="Separado(a)" {{$dados->estado_civil == 'Separado(a)' ? 'selected' : '' }}>Separado(a) </option>
        </select>
        @error('estado_civil')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div> 
    </div>

  <div class="row">
      <div class="col-sm-2">
        <label for="">Escolaridade:</label>        
        <select name="escolaridade" id="" class="form-control">
          <option value=""></option>
          <option value="Analfabeto" {{$dados->escolaridade == "Analfabeto" || old('escolaridade')=="Analfabeto" ? 'selected': ''}}>Analfabeto</option>
          <option value="Até 5º Ano Incompleto" {{$dados->escolaridade == "Até 5º Ano Incompleto" || old('escolaridade')=="Até 5º Ano Incompleto" ? 'selected': ''}}>Até 5º Ano Incompleto</option>
          <option value="5º Ano Completo" {{$dados->escolaridade == "5º Ano Completo" || old('escolaridade')=="5º Ano Completo" ? 'selected': ''}}>5º Ano Completo</option>
          <option value="6º ao 9º Ano do Fundamental" {{$dados->escolaridade == "6º ao 9º Ano do Fundamental" || old('escolaridade')=="6º ao 9º Ano do Fundamental" ? 'selected': ''}}>6º ao 9º Ano do Fundamental</option>
          <option value="Fundamental Completo" {{$dados->escolaridade == "Fundamental Completo" || old('escolaridade')=="Fundamental Completo" ? 'selected': ''}}>Fundamental Completo</option>
          <option value="Médio Incompleto" {{$dados->escolaridade == "Médio Incompleto" || old('escolaridade')=="Médio Incompleto" ? 'selected': ''}}>Médio Incompleto</option>
          <option value="Médio Completo" {{$dados->escolaridade == "Médio Completo" || old('escolaridade')=="Médio Completo" ? 'selected': ''}}>Médio Completo</option>
          <option value="Superior Incompleto" {{$dados->escolaridade == "Superior Incompleto" || old('escolaridade')=="Superior Incompleto" ? 'selected': ''}}>Superior Incompleto</option>
          <option value="Superior Completo" {{$dados->escolaridade == "Superior Completo" || old('escolaridade')=="Superior Completo" ? 'selected': ''}}>Superior Completo</option>
          <option value="Mestrado" {{$dados->escolaridade == "Mestrado" || old('escolaridade')=="Mestrado" ? 'selected': ''}}>Mestrado</option>
          <option value="Doutorado" {{$dados->escolaridade == "Doutorado" || old('escolaridade')=="Doutorado" ? 'selected': ''}}>Doutorado</option>
        </select>
        @error('escolaridade')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-2">
        <label for="">Profissão:</label>
        <input type="text" name="profissao" id="" class="form-control" placeholder=""  value="{{old('profissao') ? old('profissao') : $dados->profissao}}">
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