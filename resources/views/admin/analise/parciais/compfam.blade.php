<b>Dados da Composição familiar</b>
@php
$array = ['danger','warning','info','success'];
$count = 0;
$total = 0;
@endphp
@foreach ($dados->pComposicaoFamiliar as $i)

<div class="callout callout-{{$array[array_rand($array,1)]}}">
  <div class="row">
      <div class="col-md-6"><small><b>Nome:</b></small> <p>{{$i->nome}}</p></div>
      <div class="col-md-2"><small><b>Parentesco:</b></small><p>{{$i->parentesco}}</p></div>           
    </div>
    <div class="row">
      <div class="col-md-2"><small><b>Idade:</b></small> <p>{{$i->idade}}</p></div>      
      <div class="col-md-3"><small><b>Escolaridade:</b></small> <p>{{$i->escolaridade}}</p></div>      
      <div class="col-md-7"><small><b>Profissao:</b></small> <p>{{$i->profissao}}</p></div>       
    </div>    
    <div class="row">
      <div class="col-md-3"><small><b>Estado Civil:</b></small> <p>{{$i->estado_civil}}</p></div>
      <div class="col-md-3"><small><b>Salário:</b></small><p>{{$i->salario}}</p></div>      
    </div>    
    @php
        $count++;
        $total += str_replace(',','.',str_replace('.','',$i->salario));
    @endphp
</div>
@endforeach
@php
    Session::put('rendaMedia',number_format(floatval($total/($count)), 2, ',', '.'));
@endphp
<b>Valor médio de renda declarada:</b> <h3 class="text-danger">{{number_format(floatval($total/($count)), 2, ',', '.')}}</h3>