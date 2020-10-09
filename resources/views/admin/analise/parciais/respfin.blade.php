
<div class="callout callout-danger">
  <b>Dados do Responsável Financeiro</b>
  <div class="row">
      <div class="col-md-6"><small><b>Nome:</b></small> <p>{{$dados->pResponsavelFinanceiro->nome}}</p></div>
      <div class="col-md-2"><small><b>Estado Civil:</b></small><p>{{$dados->pResponsavelFinanceiro->estado_civil}}</p></div>           
    </div>
    <div class="row">
      <div class="col-md-2"><small><b>Vinculo:</b></small> <p>{{$dados->pResponsavelFinanceiro->resp_vinculo}}</p></div>      
      <div class="col-md-3"><small><b>Escolaridade:</b></small> <p>{{$dados->pResponsavelFinanceiro->escolaridade}}</p></div>      
      <div class="col-md-7"><small><b>Profissao:</b></small> <p>{{$dados->pResponsavelFinanceiro->profissao}}</p></div>       
    </div>
    <div class="row">
      <div class="col-md-2"><small><b>CPF:</b></small> <p>{{$dados->pResponsavelFinanceiro->cpf}}</p></div>
      <div class="col-md-2"><small><b>Rg:</b></small><p>{{$dados->pResponsavelFinanceiro->rg}}</p></div>
      <div class="col-md-3"><small><b>Orgao Emissor:</b></small> <p>{{$dados->pResponsavelFinanceiro->orgao_emissor}}</p></div>      
      <div class="col-md-2"><small><b>Data de Emissão:</b></small> <p>{{date('d/m/Y', strtotime($dados->pResponsavelFinanceiro->dt_emissor))}}</p></div>
    </div> 
    <div class="row">
      <div class="col-md-3"><small><b>Nacionalidade:</b></small> <p>{{$dados->pResponsavelFinanceiro->nacionalidade}}</p></div>
      <div class="col-md-3"><small><b>Naturalidade:</b></small><p>{{$dados->pResponsavelFinanceiro->naturalidade}}</p></div>
      <div class="col-md-2"><small><b>Data de Nascimento:</b></small> <p>{{date('d/m/Y', strtotime($dados->pResponsavelFinanceiro->dt_nasc))}}</p></div>          
    </div>         
    <div class="row">
      <div class="col-md-2"><small><b>Telefone:</b></small> <p>{{$dados->pResponsavelFinanceiro->telefone}}</p></div>
      <div class="col-md-2"><small><b>Celular:</b></small><p>{{$dados->pResponsavelFinanceiro->celular}}</p></div>      
      <div class="col-md-3"><small><b>Email:</b></small> <p>{{$dados->pResponsavelFinanceiro->email}}</p></div>      
    </div>         
</div>

<div class="callout callout-info">
  <b>Endereço</b>
  <div class="row">      
      <div class="col-md-4"><small><b>Rua:</b></small> <p>{{$dados->pResponsavelFinanceiro->rua}}</p></div>
      <div class="col-md-1"><small><b>Nº:</b></small><p>{{$dados->pResponsavelFinanceiro->numero}}</p></div>
      <div class="col-md-4"><small><b>Complemento:</b></small> <p>{{$dados->pResponsavelFinanceiro->complemento}}</p></div>      
    </div>
      <div class="row">        
          <div class="col-md-4"><small><b>Bairro:</b></small> <p>{{$dados->pResponsavelFinanceiro->bairro}}</p></div>
          <div class="col-md-4"><small><b>Cidade:</b></small> <p>{{$dados->pResponsavelFinanceiro->cidade}}</p></div>
          <div class="col-md-2"><small><b>Estado:</b></small><p>{{$dados->pResponsavelFinanceiro->estado}}</p></div>
          <div class="col-md-3"><small><b>Cep:</b></small> <p>{{$dados->pResponsavelFinanceiro->cep}}</p></div>
      </div>
</div>
  <div class="callout callout-info">            
          <b>Localização aproximada</b>
          <div class="row">
              <div class="col-sm-12">
                  <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAJoo7VgzjxM4BPcD3QNy0S3AX21_XzGhA&q={{htmlspecialchars($dados->pResponsavelFinanceiro->rua.','.$dados->pResponsavelFinanceiro->numero.','.$dados->pResponsavelFinanceiro->bairro.','.$dados->pResponsavelFinanceiro->cidade.','.$dados->pResponsavelFinanceiro->estado.','.$dados->pResponsavelFinanceiro->cep)}}" 
                    width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>        
                </div>
          </div>            
  </div>