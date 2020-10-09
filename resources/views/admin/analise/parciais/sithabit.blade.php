
<div class="callout callout-danger">
  <b>Dados do Situação Habitacional</b>
  <div class="row">
      <div class="col-md-6"><small><b>Tipo:</b></small> <p>{{$dados->pResponsavelFinanceiro->pSituacaohabitacional->tipo_habitacao}}</p></div>
      <div class="col-md-2"><small><b>Qtd. de Cômodos:</b></small><p>{{$dados->pResponsavelFinanceiro->pSituacaohabitacional->tipo_habitacao_comodos}}</p></div>           
    </div>
    <div class="row">
      <div class="col-md-2"><small><b>Tipo de moradia:</b></small> <p>{{$dados->pResponsavelFinanceiro->pSituacaohabitacional->tipo_moradia}}</p></div>      
      <div class="col-md-3"><small><b>Tipo de Residência:</b></small> <p>{{$dados->pResponsavelFinanceiro->pSituacaohabitacional->tipo_residencia}}</p></div>      
      <div class="col-md-7"><small><b>Tempo de residência:</b></small> <p>{{$dados->pResponsavelFinanceiro->pSituacaohabitacional->tempo_moradia}}</p></div>       
    </div>
    <div class="row">
      <div class="col-md-3"><small><b>Outras moradias no terreno?</b></small> <p>{{$dados->pResponsavelFinanceiro->pSituacaohabitacional->outras_moradias}}</p></div>
      <div class="col-md-3"><small><b>Outras moradias vinculo:</b></small><p>{{$dados->pResponsavelFinanceiro->pSituacaohabitacional->outras_moradias_vinculo}}</p></div>      
    </div>
    <div class="row">
      <div class="col-md-3"><small><b>Inscrito no cadastro único:</b></small> <p>{{$dados->pResponsavelFinanceiro->pSituacaohabitacional->cad_unico}}</p></div>            
    </div>
</div>