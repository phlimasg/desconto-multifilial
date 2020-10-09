
<b>Bens móveis</b>
@php
$array = ['danger','warning','info','success'];
@endphp
@forelse ($dados->pResponsavelFinanceiro->pBensMoveis as $i)
<div class="callout callout-{{$array[array_rand($array,1)]}}">
  <div class="row">
      <div class="col-md-6"><small><b>Fabricante:</b></small> <p>{{$i->veiculo_fabricante}}</p></div>
      <div class="col-md-6"><small><b>Ano:</b></small><p>{{$i->veiculo_ano}}</p></div>           
    </div>
    <div class="row">
      <div class="col-md-6"><small><b>Modelo:</b></small> <p>{{$i->veiculo_modelo}}</p></div>      
      <div class="col-md-6"><small><b>Placa:</b></small> <p>{{$i->veiculo_placa}}</p></div>            
    </div>
</div>    
@empty
    Nenhum bem móvel cadastrado...
@endforelse