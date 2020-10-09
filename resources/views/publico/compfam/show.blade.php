@extends('layout.publico')

@section('title', 'Filiação')

@section('content_header')
    
@stop

@section('content')
<div class="container-fluid" id="conteudo">

  <div><a href="#"  data-toggle="modal" data-target="#AddMembro" class="btn btn-primary" style="float: right"><i class="fa fa-plus"></i> Adicionar membro</a>
    <h3>Dados da Composição Familiar</h3>
  </div>
  @php
      $doc = false;
  @endphp
  <hr>
  
  <div class="modal fade" id="AddMembro">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Adicionar Membro</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">       
  
          <form id="formulario" action="{{ route('pComposicaoFamiliar.store', ['filial'=>$filial,'processo'=>$processo->url]) }}" method="post" enctype="multipart/form-data">
            @csrf
          <input type="hidden" name="public_aluno_id" value="{{$dados->id}}">          
          <input type="hidden" name="processo_id" value="{{ $processo->id}}">
            <div class="row">      
              <div class="col-sm-6">
                <label for="">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="" value="@if ($dados->parentesco == "Aluno")
                {{old('nome') ? old('nome') : $dados->nome}}
                @else
                {{old('nome') ? old('nome') : ''}}
                @endif
                ">
                @error('nome')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="col-sm-2">
                <label for="">Parentesco:</label>
                <input type="text" name="parentesco" id="" class="form-control" placeholder="" value="{{old('parentesco') ? old('parentesco') : $dados->parentesco}}">
                @error('parentesco')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="col-sm-1">
                <label for="">Idade:</label>
                <input type="text" name="idade" id="" class="form-control" placeholder="" value="{{old('idade') ? old('idade') :  '' }}" data-mask="#00" data-mask-reverse="true">
                @error('idade')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="col-sm-2">
                <label for="">Estado Civil:</label>
                <select name="estado_civil" id="" class="form-control">
                  <option value=""></option>
                  <option value="Solteiro(a)" {{$dados->parentesco == 'Aluno' ? 'selected' : '' }}>Solteiro(a)</option>
                  <option value="Casado(a)">Casado(a)</option>
                  <option value="Divorciado(a)">Divorciado(a) </option>
                  <option value="Viúvo(a)">Viúvo(a)</option>
                  <option value="Separado(a)">Separado(a) </option>
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
                  <option value="Analfabeto" {{$dados->escolaridade == 'Aluno' ? 'selected' : '' }}>Analfabeto</option>
                  <option value="Até 5º Ano Incompleto">Até 5º Ano Incompleto</option>
                  <option value="5º Ano Completo">5º Ano Completo</option>
                  <option value="6º ao 9º Ano do Fundamental">6º ao 9º Ano do Fundamental</option>
                  <option value="Fundamental Completo">Fundamental Completo</option>
                  <option value="Médio Incompleto">Médio Incompleto</option>
                  <option value="Médio Completo">Médio Completo</option>
                  <option value="Superior Incompleto">Superior Incompleto</option>
                  <option value="Superior Completo">Superior Completo</option>
                  <option value="Mestrado">Mestrado</option>
                  <option value="Doutorado">Doutorado</option>
                </select>
                @error('escolaridade')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>   
              <div class="col-sm-2">
                <label for="">Profissão:</label>
                <input type="text" name="profissao" id="" class="form-control" placeholder="" value="{{$dados->parentesco == 'Aluno' ? 'Aluno' : old('profissao') }}">
                @error('profissao')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div> 
              <div class="col-sm-2">
                <label for="">Salário bruto:</label>
                <input type="text" name="salario" id="" class="form-control" placeholder="" value="{{$dados->parentesco == 'Aluno' ? '0,00' : old('salario') }}" data-mask="###.000,00" data-mask-reverse="true">
                @error('salario')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div> 
              <div class="col-sm-6">
                <label for="" id="legenda" class="text-danger">Documentos:</label>
                <input type="file" name="documentos[]" id="" required class="form-control" placeholder="" accept="image/jpg, image/jpeg, application/pdf" multiple>
                <small>Documentos e renda. Ex.: Imposto de renda, contra-cheque, Rg, Cfp e etc...</small>
                @error('documentos.*')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div> 
            </div>
            
        </div>
          <div class="modal-footer">
            <div class="row">
              <div class="col-sm-12">
                <button type="submit" id="btnsubmit" class="btn btn-block btn-danger btn-lg"><i class="fa fa-floppy-o"></i> Adicionar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
  
    </div>
  </div> 
    @forelse ($dados->pComposicaoFamiliar()->get() as $i)
    <div class="card" style="background-color: beige">   
      <div class="card-body"> 
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Parentesco</th>
                <th>Idade</th>
                <th>Estado Civil</th>
                <th>Escolaridade</th>
                <th>Profissao</th>
                <th>Salário</th>        
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$i->nome}}</td>
                <td>{{$i->parentesco}}</td>
                <td>{{$i->idade}} </td>
                <td>{{$i->estado_civil}} </td>
                <td>{{$i->escolaridade}} </td>
                <td>{{$i->profissao}} </td>
                <td>{{$i->salario}} </td>        
              </tr>
            </tbody>
          </table>
        </div>        
        <a href="#" class="btn btn-success" style="float: right" data-toggle="modal" data-target="#addDoc{{$i->id}}"><i class="fa fa-plus"></i> Adicionar documentos</a>
        <h6 class="card-title">Documentos adicionados:</h6>

        <!-- The Modal -->
        <div class="modal fade" id="addDoc{{$i->id}}">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Adicionar Documentos</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <form id="formdoc" action="{{ route('pDocumentos.store', ['filial'=>$filial,'processo'=>$processo->url]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <h5>Adicione mais documentos para {{$i->nome}}.</h5>
                  <input type="hidden" name="comp_id" value="{{$i->id}}">
                  <input type="file" name="documentos[]" class="form-control" accept="application/pdf, image/jpg, image/jpeg" multiple>
                </div>  
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" id="btnsubmitdoc" class="btn btn-primary"><i class="fa fa-plus"></i>Enviar</button>
                </div>
              </form>
              <!-- Modal body -->

            </div>
          </div>
        </div>

        <br>
          <div class="card">
            <div class="card-body">
              <div class="row">
                @forelse ($i->pDocumentos()->get() as $j)
                @php
                  $doc = true
                @endphp
                  <div class="col-sm-2 bg-light">
                    <div class="row">
                      <div class="col-sm-12 text-center">
                        @if (strpos($j->nome,'.pdf'))
                          <img src="{{asset('img/pdf.png')}}" alt="" width="100%">                            
                        @else
                        <img src="{{Storage::url($j->url)}}" alt="" style="max-height: 136px">
                        @endif
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 text-center">
                        {{mb_strimwidth($j->nome,0,15,'...')}}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <form action="{{ route('pDocumentos.destroy', ['filial'=>$filial,'processo'=>$processo->url,'pDocumento'=>$j->id]) }}" method="post">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-trash"></i></button>                          
                        </form>
                      </div>
                    </div>              
                  </div>
                @empty
                  Nenhum Documento...                  
                @endforelse
              </div>
            </div>
          </div>
        </div>  
      </div>  
      <br>  
    @empty
        Nenhum membro adicionado
    @endforelse
  
  @if($doc != false)
    @if ($processo->tipo == 'bolsa')
    <a href="{{ route('pSituacaoHabitacional.show', ['filial'=>$filial,'processo'=>$processo->url, 'pSituacaoHabitacional'=>$aluno]) }}" class="btn btn-danger btn-block"><i class="fa fa-floppy-o"></i> Salvar</a>
    @else
    <a href="{{ route('pVeiculos.show', ['filial'=>$filial,'processo'=>$processo->url, 'pVeiculo'=>$aluno]) }}" class="btn btn-danger btn-block"><i class="fa fa-floppy-o"></i> Salvar</a>
    @endif
  @endif
</div>
<script>
  $('#nome').change(function(){    
    $('#legenda').text('Anexe todos os documentos de: '+$('#nome').val())
  });  
</script>

@stop

@section('css')

@stop

@section('js')
<script>
  $('#formulario').submit(function(){
    $('#btnsubmit').prop('disabled', true);
  });
  $('#formdoc').submit(function(){
    $('#btnsubmitdoc').prop('disabled', true);
  });  
</script>
  @if ($errors->any())  
    <script>
      $(document).ready(function(){
        $("#addMembro").modal("show");    
        console.log('modalOpen');
      });
    </script>
  @endif 
@stop