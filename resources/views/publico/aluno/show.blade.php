@extends('layout.publico')

@section('title', 'Bolsa/Desconto')

@section('content_header')
    
@stop

@section('content')
<div class="container-fluid" id="conteudo">
  <form action="{{ route('pAluno.update', ['filial'=>$filial,'processo'=>$processo->id,'pAluno'=>$aluno]) }}" method="post">
    @csrf
    @method('put')
  <input type="hidden" name="processo_id" value="{{ $processo->id}}">
    <h3>Dados do Aluno</h3>
    <div class="row">
      <input type="text" name="ra" id="" class="form-control" placeholder="" value="{{$dados->ra}}" hidden>        
      <div class="col-sm-6">
        <label for="">Nome do Aluno:</label>
        <input type="text" name="nome" id="" class="form-control" placeholder="" value="{{old('nome') ? old('nome') : $dados->nome}}">
        @error('nome')
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
    </div>    
    <div class="row">
      <div class="col-sm-2">
        <label for="">Série:</label>
        <input type="text" name="serie" id="" class="form-control" placeholder="" value="{{old('serie') ? old('serie') : $dados->serie}}">
        @error('serie')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-2">
        <label for="">Escolaridade:</label>
        <input type="text" name="escolaridade" id="" class="form-control" placeholder="" value="{{old('escolaridade') ? old('escolaridade') : $dados->escolaridade}}">
        @error('escolaridade')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
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
      <div class="col-sm-2">
        <label for="">Sexo:</label>
        <select name="sexo" id="" class="form-control">
          <option value="" ></option>
          <option value="M" {{$dados->sexo =='M' || old('sexo')=='M' ? 'selected' : ''}}>Masculino</option>
          <option value="F" {{$dados->sexo =='F' || old('sexo')=='F' ? 'selected' : ''}}>Feminino</option>
        </select>
        @error('sexo')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div>
    <div class="row">      
      <div class="col-sm-3">
        <label for="dt_nasc">Data de Nascimento:</label>
        <input type="date" name="dt_nasc" id="" class="form-control" placeholder="" value="{{old('dt_nasc') ? old('dt_nasc') : $dados->dt_nasc}}">     
        @error('dt_nasc')
          <span class="text-danger">{{$message}}</span>
        @enderror   
      </div>
      <div class="col-sm-3">
        <label for="">Email:</label>
        <input type="email" name="email" id="" class="form-control" placeholder="" value="{{old('email') ? old('email') : $dados->email}}">  
        @error('email')
          <span class="text-danger">{{$message}}</span>
        @enderror      
      </div>      
      <div class="col-sm-3">
        <label for="">Telefone:</label>
        <input type="text" name="telefone" id="" class="form-control" placeholder="" data-mask="(00)#0000-0000" value="{{old('telefone') ? old('telefone') : $dados->telefone}}">    
        @error('telefone')
          <span class="text-danger">{{$message}}</span>
        @enderror    
      </div> 
    </div>
    <div class="row">
      <div class="col-sm-4">
        <label for="">Escola de Origem:</label>
        <input type="text" name="esc_origem" id="" class="form-control" placeholder="" value="{{old('esc_origem') ? old('esc_origem') : $dados->esc_origem}}">
        @error('esc_origem')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-2">
        <label for="">Escola de Origem Tipo:</label>
        <select name="esc_origem_tipo" id="" class="form-control">
          <option value=""></option>
          <option value="Escola pública" {{$dados->esc_origem_tipo =='Escola pública' || old('esc_origem_tipo')=='pública' ? 'selected' : ''}}>Escola pública</option>
          <option value="Escola Particular" {{$dados->esc_origem_tipo =='Escola Particular' || old('esc_origem_tipo')=='Escola Particular' ? 'selected' : ''}}>Escola Particular</option>
        </select>
        @error('esc_origem_tipo')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-2">
        <label for="">Bolsa/Desconto:</label>
        <input type="text" name="esc_origem_desconto" id="" class="form-control" placeholder="" data-mask="#00%" data-mask-reverse="true" value="{{old('esc_origem_desconto') ? old('esc_origem_desconto') : $dados->esc_origem_desconto}}">
        @error('esc_origem_desconto')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <label for="">Reside próximo ao Colégio?</label>
        <select name="reside_proximo" id="" class="form-control">
          <option value=""></option>          
          <option value="S" {{$dados->reside_proximo =='S' ||old('reside_proximo')=="S" ? 'selected': ''}}>Sim</option>
          <option value="N" {{$dados->reside_proximo =='N' ||old('reside_proximo')=="N" ? 'selected': ''}}>Não</option>
        </select>
        @error('reside_proximo')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-5">         
        <label for="">Tipo de transporte utilizado:</label>
        <select name="transp_utilizado" id="" class="form-control">
          <option value="" ></option>
          <option value="Carro próprio" {{$dados->transp_utilizado =='Carro próprio' || old('transp_utilizado')=="Carro próprio" ? 'selected': ''}}>Carro próprio</option>
          <option value="Carona" {{$dados->transp_utilizado =='Carona' || old('transp_utilizado')=="Carona" ? 'selected': ''}}>Carona</option>
          <option value="Ônibus" {{$dados->transp_utilizado =='Ônibus' || old('transp_utilizado')=="Ônibus" ? 'selected': ''}}>Ônibus</option>
          <option value="Van" {{$dados->transp_utilizado =='Van' || old('transp_utilizado')=="Van" ? 'selected': ''}}>Van</option>
          <option value="Não utiliza transporte (vai à escola a pé)" {{$dados->transp_utilizado =='Não utiliza transporte (vai à escola a pé' || old('transp_utilizado')=="Não utiliza transporte (vai à escola a pé)" ? 'selected': ''}}>Não utiliza transporte (vai à escola a pé)</option>
        </select>
        @error('transp_utilizado')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2">
        <label for="">Deficiência?</label>
        <select name="deficiencia" id="" class="form-control">
          <option value=""></option>
          <option value="S" {{$dados->deficiencia =='S' || old('deficiencia')=="S" ? 'selected': ''}}>Sim</option>
          <option value="N" {{$dados->deficiencia =='N' || old('deficiencia')=="N" ? 'selected': ''}}>Não</option>
        </select>
        @error('deficiencia')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-3">
        <label for="">Qual?</label>
        <input type="text" name="deficiencia_tipo" id="" class="form-control" placeholder="" value="{{old('deficiencia_tipo') ? old('deficiencia_tipo') : $dados->deficiencia_tipo}}">
        @error('deficiencia_tipo')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <label for="">Possui irmão(s) estudando nesta unidade?</label>
        <select name="irmao_select" id="" class="form-control">
          <option value=""></option>
          <option value="S" {{$dados->irmao_ra || old('irmao_select')=="S" ? 'selected': ''}}>Sim</option>
          <option value="N" {{!$dados->irmao_ra || old('irmao_select')=="N" ? 'selected': ''}}>Não</option>
        </select>
        @error('irmao_select')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-2">
        <label for="">Matricula do irmão:</label>
        <input type="text" name="irmao_ra" id="" class="form-control" placeholder="" data-mask="##########00" value="{{old('irmao_ra') ? old('irmao_ra') : $dados->irmao_ra}}">
        @error('irmao_ra')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-6">
        <label for="">Nome do irmão:</label>
        <input type="text" name="irmao" id="" class="form-control" placeholder="" value="{{old('irmao') ? old('irmao') : $dados->irmao}}">
        @error('irmao')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div>
    <hr>
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