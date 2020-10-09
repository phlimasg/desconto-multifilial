
<div class="callout callout-danger">
  <b>Dados do Mãe</b>
  <div class="row">
      <div class="col-md-2"><small><b>Nome:</b></small> <p>{{$dados->pFiliacao->mae_nome}}</p></div>
      <div class="col-md-2"><small><b>Cpf:</b></small><p>{{$dados->pFiliacao->mae_cpf}}</p></div>
      <div class="col-md-2"><small><b>Rg:</b></small> <p>{{$dados->pFiliacao->mae_rg}}</p></div>      
    </div>
    <div class="row">
      <div class="col-md-3"><small><b>Telefone:</b></small> <p>{{$dados->pFiliacao->mae_telefone}}</p></div>
      <div class="col-md-2"><small><b>Data de Nascimento:</b></small> <p>{{date('d/m/Y', strtotime($dados->pFiliacao->mae_dt_nasc))}}</p></div>
      <div class="col-md-2"><small><b>Tipo de guarda:</b></small><p>{{$dados->pFiliacao->mae_tipo_guarda}}</p></div>
    </div>         
</div>

<div class="callout callout-info">
  <b>Dados do Pai</b>
  <div class="row">
      <div class="col-md-2"><small><b>Nome:</b></small> <p>{{$dados->pFiliacao->pai_nome}}</p></div>
      <div class="col-md-2"><small><b>Cpf:</b></small><p>{{$dados->pFiliacao->pai_cpf}}</p></div>
      <div class="col-md-2"><small><b>Rg:</b></small> <p>{{$dados->pFiliacao->pai_rg}}</p></div>      
    </div>
    <div class="row">
      <div class="col-md-3"><small><b>Telefone:</b></small> <p>{{$dados->pFiliacao->pai_telefone}}</p></div>
      <div class="col-md-2"><small><b>Data de Nascimento:</b></small> <p>{{date('d/m/Y', strtotime($dados->pFiliacao->pai_dt_nasc))}}</p></div>
      <div class="col-md-2"><small><b>Tipo de guarda:</b></small><p>{{$dados->pFiliacao->pai_tipo_guarda}}</p></div>
    </div>         
</div>