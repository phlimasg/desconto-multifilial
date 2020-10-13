 <!-- Modal -->
<form action="{{ route('analisar.store', ['filial'=>$filial->url, 'processo'=>$processo->url]) }}" method="POST">
    @csrf
    <input type="hidden" name="public_aluno_id" value="{{$dados->id}}">
    <div class="modal fade" id="alterarStatus" role="dialog">
        <div class="modal-dialog modal-lg" style="max-width: 98%">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Alterar Status</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control @error('status') is-invalid @enderror">
                            <option value=""></option>   
                            <option value="Falta Documento" @if (old('status') == 'Falta Documento') selected @endif>Falta Documento</option>
                            @cannot('AssistenteSocial', Auth::user())
                                <option value="Em Análise - AS" @if (old('status') == 'Em Análise - AS') selected @endif>Em Análise - AS</option>
                            @endcannot
                                @can('AssistenteSocial', Auth::user())
                                    <option value="Em Análise - CD" @if (old('status') == 'Em Análise - CD') selected @endif>Em Análise - CD</option>
                                @endcan    
                                @can('Comissao', Auth::user())
                                    <option value="Supervisão Administrativa" @if (old('status') == 'Supervisão Administrativa') selected @endif>Supervisão Administrativa</option>
                                @endcan    
                                @can('Supervisao', Auth::user())
                                    <option value="Deferido" @if (old('status') == 'Deferido') selected @endif>Deferido</option>                                    
                                @endcan    
                                <option value="Indeferido" @if (old('status') == 'Indeferido') selected @endif>Indeferido</option>
                        </select>
                        @error('status') <div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        @cannot('AssistenteSocial', Auth::user())
                            @can('Comissao', Auth::user())
                            <label for="">Percentual sugerido - AS</label>
                            @endcan
                            @can('Supervisao', Auth::user())
                            <label for="">Percentual sugerido - CD</label>
                            @endcan
                            <select name="desconto_sugerido" id="" class="form-control @error('desconto_sugerido') is-invalid @enderror">                            
                                <option value="" ></option>
                                <option value="50%"
                                @if (old('desconto_sugerido') =='50%')
                                    selected
                                @elseif(!empty($dados->Analise->desconto_sugerido) && $dados->Analise->desconto_sugerido == '50%')
                                    selected
                                @endif
                                >50%</option>
                                <option value="100%"
                                @if (old('desconto_sugerido') =='100%')
                                    selected
                                @elseif(!empty($dados->Analise->desconto_sugerido) && $dados->Analise->desconto_sugerido == '100%')
                                    selected
                                @endif>100%</option>
                                <option value="Fora de critério de renda"
                                @if (old('desconto_sugerido') =='Fora de critério de renda')
                                    selected
                                @elseif(!empty($dados->Analise->desconto_sugerido) && $dados->Analise->desconto_sugerido == 'Fora de critério de renda')
                                    selected
                                @endif>100%</option>
                                >Fora de critério de renda</option>
                            </select>
                            @error('desconto_sugerido') <div class="alert alert-danger">{{ $message }}</div>@enderror
                        @endcannot
                    </div>
                </div>
                @can('AssistenteSocial', Auth::user())                
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Reside próximo a escola?</label>
                        <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="reside_proximo" value="S"
                                @if (old('reside_proximo') =='S')
                                    checked
                                @elseif(!empty($dados->Analise->reside_proximo) && $dados->Analise->reside_proximo == 'S')
                                    checked
                                @elseif($dados->reside_proximo == "S")
                                    checked
                                @endif>Sim
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label @error('reside_proximo') is-invalid @enderror">
                              <input type="radio" class="form-check-input" name="reside_proximo" value="N" 
                              @if (old('reside_proximo') =='N')
                                    checked
                                @elseif(!empty($dados->Analise->reside_proximo) && $dados->Analise->reside_proximo == 'N')
                                    checked
                                @elseif($dados->reside_proximo == "N")
                                    checked
                                @endif>Não
                            </label>
                        </div>
                        @error('reside_proximo') <div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">Beneficiário de programa de transferência de renda?</label>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="programa_renda_chk" value="S" 
                                        @if (old('programa_renda_chk') =='S')
                                            checked
                                        @elseif(!empty($dados->Analise->programa_renda) && $dados->Analise->programa_renda != 'N')
                                            checked
                                        @elseif($dados->programa_renda == "S")
                                            checked
                                        @endif
                                      >Sim
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="programa_renda_chk" value="N" 
                                        @if (old('programa_renda_chk') =='N')
                                            checked
                                        @elseif(!empty($dados->Analise->programa_renda) && $dados->Analise->programa_renda == 'N')
                                            checked
                                        @elseif($dados->programa_renda == "N")
                                            checked
                                        @endif
                                      >Não
                                    </label>
                                </div>
                                @error('programa_renda_chk') <div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">                                
                                <input type="text" class="form-control" placeholder="Qual?" name="programa_renda" 
                                @if (old('programa_renda'))
                                    value="{{old('programa_renda')}}"
                                @elseif(!empty($dados->Analise->programa_renda) && $dados->Analise->programa_renda != 'N')
                                    value="{{$dados->Analise->programa_renda}}"                                
                                @endif
                                >
                                @error('programa_renda') <div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Deficiencia?</label>
                        <input type="text" class="form-control @error('deficiencia') is-invalid @enderror" name="deficiencia" placeholder="Qual?"
                        @if (old('deficiencia'))
                            value="{{old('deficiencia')}}"
                        @elseif(!empty($dados->Analise->deficiencia))
                            value="{{$dados->Analise->deficiencia}}"
                        @elseif(!empty($dados->deficiencia))   
                            value="{{$dados->deficiencia}}"                            
                        @endif
                                >
                                @error('deficiencia') <div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div> 
                    <div class="col-md-4">
                        <label for="">Irmãos estudam na escola?</label>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="irmao" value="S" 
                                        @if (old('irmao')=='S')
                                            checked
                                        @elseif(!empty($dados->Analise->irmao_nome))
                                            checked
                                        @elseif(!empty($dados->irmao))   
                                        checked                           
                                        @endif
                                      >Sim
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="irmao" value="N" 
                                      @if (old('irmao')=='N')
                                            checked
                                        @elseif(!empty($dados->Analise->irmao_nome) && $dados->Analise->irmao_nome== null)
                                            checked
                                        @elseif($dados->irmao == null)   
                                        checked                           
                                        @endif
                                      >Não
                                    </label>
                                </div>
                                @error('irmao') <div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">                                                         
                                <input type="text" class="form-control @error('irmao_nome') is-invalid @enderror" placeholder="Qual nome?" name="irmao_nome"
                                @if (old('irmao_nome'))
                                    value="{{old('irmao_nome')}}"
                                @elseif(!empty($dados->Analise->irmao_nome) && $dados->Analise->irmao_nome!= null)
                                    value="{{$dados->Analise->irmao_nome}}"                         
                                @endif
                                >  
                                @error('irmao_nome') <div class="alert alert-danger">{{ $message }}</div>@enderror                              
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <label for="">Irmãos possuem bolsa?</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="irmao_desconto" value="S"
                                      @if (old('irmao_desconto')=="S")
                                            checked
                                        @elseif(!empty($dados->Analise->irmao_bolsa) && $dados->Analise->irmao_bolsa!= null)
                                            checked                          
                                        @endif
                                      >Sim
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="irmao_desconto" value="N"
                                        @if (old('irmao_desconto')=="N")
                                            checked
                                        @elseif(!empty($dados->Analise->irmao_bolsa) && $dados->Analise->irmao_bolsa== null)
                                            checked                          
                                        @endif
                                      >Não
                                    </label>
                                </div>
                                @error('irmao_desconto') <div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('irmao_bolsa') is-invalid @enderror" placeholder="Percentual" name="irmao_bolsa" data-mask="#00%" data-mask-reverse="true"
                                @if (old('irmao_bolsa'))
                                    value="{{old('irmao_bolsa')}}"
                                @elseif(!empty($dados->Analise->irmao_bolsa) && $dados->Analise->irmao_bolsa != null)
                                    value="{{$dados->Analise->irmao_bolsa}}"                         
                                @endif
                                >
                                @error('irmao_bolsa') <div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="row">                    
                    <div class="col-md-2">
                        <label for="">Renda Bruta Familiar:</label>
                        <input type="text" id="renda_bruta" class="form-control @error('renda_bruta') is-invalid @enderror" name="renda_bruta" placeholder="" data-mask="#.000,00" data-mask-reverse="true"
                        @if (old('renda_bruta'))
                            value="{{old('renda_bruta')}}"
                        @elseif(!empty($dados->Analise->renda_bruta) && $dados->Analise->renda_bruta != null)
                            value="{{$dados->Analise->renda_bruta}}"                         
                        @endif
                        >
                        @error('renda_bruta') <div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>                    
                    <div class="col-md-2">
                        <label for="">Nº de familiares:</label>
                        <input type="text" id="numero_familiares" class="form-control @error('numero_familiares') is-invalid @enderror" name="numero_familiares" placeholder="" data-mask="00"
                        @if (old('numero_familiares'))
                            value="{{old('numero_familiares')}}"
                        @elseif(!empty($dados->Analise->numero_familiares) && $dados->Analise->numero_familiares != null)
                            value="{{$dados->Analise->numero_familiares}}"                         
                        @endif
                        >
                        @error('numero_familiares') <div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-2">
                        <label for="">Renda per capita:</label>
                        <input type="text" id="renda_capita" class="form-control @error('renda_capita') is-invalid @enderror" name="renda_capita" 
                        @if (old('renda_capita'))
                            value="{{old('renda_capita')}}"
                        @elseif(!empty($dados->Analise->renda_capita) && $dados->Analise->renda_capita != null)
                            value="{{$dados->Analise->renda_capita}}"                         
                        @endif
                        >
                        @error('renda_capita') <div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-2">
                        <label for="">Faixa de benefício:</label>
                        <select name="desconto_sugerido" id="" class="form-control @error('desconto_sugerido') is-invalid @enderror">
                            <option value=""></option>
                            <option value="50%" 
                            @if (old('desconto_sugerido')=="50%")
                                selected
                            @elseif(!empty($dados->Analise->desconto_sugerido) && $dados->Analise->desconto_sugerido== '50%')
                            selected                          
                            @endif
                            >50%</option>
                            <option value="100%"
                            @if (old('desconto_sugerido')=="100%")
                            selected
                            @elseif(!empty($dados->Analise->desconto_sugerido) && $dados->Analise->desconto_sugerido== '100%')
                            selected                          
                            @endif
                            >100%</option>
                            <option value="Fora de critério de renda"
                            @if (old('desconto_sugerido')=="Fora de critério de renda")
                            selected
                            @elseif(!empty($dados->Analise->desconto_sugerido) && $dados->Analise->desconto_sugerido== 'Fora de critério de renda')
                            selected                          
                            @endif
                            >Fora de critério de renda</option>                            
                        </select>
                        @error('desconto_sugerido') <div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="">Percentual se beneficiário de bolsa nessa instituição:</label>
                        <select name="desconto_anterior" id="" class="form-control @error('desconto_anterior') is-invalid @enderror">
                            <option value=""></option>
                            <option value="50%"
                            @if (old('desconto_anterior')=="50%")
                            selected
                            @elseif(!empty($dados->Analise->desconto_anterior) && $dados->Analise->desconto_anterior== '50%')
                            selected                          
                            @endif
                            >50%</option>
                            <option value="100%"
                            @if (old('desconto_anterior')=="100%")
                            selected
                            @elseif(!empty($dados->Analise->desconto_anterior) && $dados->Analise->desconto_anterior== '100%')
                            selected                          
                            @endif
                            >100%</option>                            
                        </select>
                        @error('desconto_anterior') <div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                </div>                
                <div class="row">
                    <div class="col-md-12 callout callout-success">
                        <label for="">Observações/Parecer da Assistente Social:</label>                         
                    <textarea name="parecer" id="obsAssintente" cols="30" rows="10" class="form-control @error('parecer') is-invalid @enderror">{{!empty($dados->Analise->parecer)?$dados->Analise->parecer:'' }}</textarea>
                    @error('parecer') <div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>                    
                </div>
                @endcan
                <hr>
                <div class="row">
                    <div class="col-md-6 callout callout-info">
                        <label for="">Mensagem Interna:</label>
                        <p class="text-danger"><small>Apenas para comunicação entre os colaboradores participantes do processo.</small></p>
                        <textarea name="msg_interna" id="msg_interna" cols="30" rows="10" class="form-control @error('msg_interna') is-invalid @enderror"> </textarea>
                        @error('msg_interna') <div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6 callout callout-danger">
                        <label for="">Mensagem para o responsável:</label>
                        <p class="text-danger"><small>Mensagem que será enviada por e-mail para o usuário.*Somente com os status de falta Documento e Deferido.</small></p>
                        <textarea name="msg_usuario" id="msg_usuario" cols="30" rows="10" class="form-control @error('msg_usuario') is-invalid @enderror"> </textarea>
                        @error('msg_usuario') <div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar Alteração</button>
            </div>
            </div>
        </div>
    </div>
</form>
@section('js')
@include('parciais.alert')
@if ($errors->any())
    <script>$('#alterarStatus').modal('show');</script>
@endif
<script>
    $(document).ready(function(){
        $('#numero_familiares').change(function(){            
            $('#renda_capita').unmask();
            $('#renda_capita').val('');
            var renda_bruta = $('#renda_bruta').val().replace(',', '');
            var renda_percapita;
            renda_bruta = renda_bruta.replace('.','');
            renda_percapita = renda_bruta / $('#numero_familiares').val();
            $('#renda_capita').val(renda_percapita.toFixed(0));
            //alert($('#renda_capita').val() + renda_percapita)
            $('#renda_capita').mask('#.##0,00', {reverse: true});
        })
        CKEDITOR.replace('obsAssintente');
        CKEDITOR.replace('msg_interna');
        CKEDITOR.replace('msg_usuario');  
    });    
</script>  
@endsection