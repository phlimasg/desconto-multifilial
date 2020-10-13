<b>Receitas e Despesas</b>
@php
$array = ['danger','warning','info','success'];
$count = 0;
$despesa = 0;
$receita = 0;
@endphp
@foreach ($dados->pDespesasEReceitas as $i)
<div class="callout callout-{{$i->tipo=='despesa'?'danger':'success'}}">
  <div class="row">        
    <div class="col-md-2"><small><b>Descrição:</b></small><p>{{$i->descricao}}</p></div>           
    <div class="col-md-2"><small><b>Observação:</b></small> <p>{{$i->observacao}}</p></div>      
    <div class="col-md-8">
      <div class="ribbon-wrapper ribbon-lg">
        <div class="ribbon bg-{{$i->tipo=='despesa'?'danger':'success'}}">
          {{$i->tipo}}
        </div>
      </div>
    <small><b>Valor:</b></small> <p><b class="text-{{$i->tipo=='despesa'?'danger':'success'}}">{{$i->valor}}</b></p>
  </div>   
  </div>
  <hr>
  <small><p><b>Documentos adicionados:</b></p></small>
  <div class="row">    
      @forelse ($i->pDespesasEReceitasDocumentos as $j)
      <div class="col-sm-2 bg-light">
        <div class="row">
          <div class="col-sm-12 text-center">
            <a href="{{Storage::url($j->url)}}" target="_blank">
              @if (strpos($j->nome,'.pdf'))
              <img src="{{asset('img/pdf.png')}}" alt="" width="100%">                            
            @else
            <img src="{{Storage::url($j->url)}}" alt="" style="max-height: 136px; max-width: 100%;">
            @endif
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 text-center">
            {{mb_strimwidth($j->nome,0,15,'...')}}
          </div>
        </div>           
      </div>
      @empty
          Nenhum documento anexado
      @endforelse    
  </div>    
    @php
        $count++;
        $i->tipo=='despesa'?$despesa += str_replace(',','.',str_replace('.','',$i->valor)):$receita += str_replace(',','.',str_replace('.','',$i->valor)) ;       
    @endphp
</div>
@endforeach
<div class="row">
  <div class="col-sm-3"><b>Total de despesas:</b> <h3 class="text-danger">{{number_format(floatval($despesa), 2, ',', '.')}}</h3></div>
  <div class="col-sm-3"><b>Total de receitas:</b> <h3 class="text-success">{{number_format(floatval($receita), 2, ',', '.')}}</h3></div>
  <div class="col-sm-3"><b>Sobra:</b> <h3 class="text-info">{{number_format(floatval($receita-$despesa), 2, ',', '.')}}</h3></div>
  <div class="col-sm-3"><b>Renda Média declarada:</b> <h3 class="text-success">{{Session::get('rendaMedia')}}</h3></div>
</div>