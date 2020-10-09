
<div class="callout callout-danger">
  <b>Dados do Situação Habitacional</b>
  <div class="row">
      <div class="col-md-6"><small><b>Possui rede de esgoto?</b></small> <p>{{$dados->pRedeDeAbastecimento->esgoto}}</p></div>
      <div class="col-md-6"><small><b>Possui intens de instalção sanitária?</b></small><p>{{$dados->pRedeDeAbastecimento->sanitaria}}</p></div>           
    </div>
    <div class="row">
      <div class="col-md-6"><small><b>Como é o abastecimento de água?</b></small> <p>{{$dados->pRedeDeAbastecimento->agua}}</p></div>      
      <div class="col-md-6"><small><b>Como é o abastecimento de energia?</b></small> <p>{{$dados->pRedeDeAbastecimento->energia}}</p></div>            
    </div>
</div>