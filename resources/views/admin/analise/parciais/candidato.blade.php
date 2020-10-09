
      <div class="callout callout-danger">
        <b>Dados do Aluno</b>
        <div class="row">
            <div class="col-md-2"><small><b>RA/Matricula:</b></small> <p>{{$dados->ra}}</p></div>
            <div class="col-md-2"><small><b>Série:</b></small><p>{{$dados->serie}}</p></div>
            <div class="col-md-2"><small><b>Escolaridade:</b></small> <p>{{$dados->escolaridade}}</p></div>      
          </div>
          <div class="row">
            <div class="col-md-3"><small><b>Nome:</b></small> <p>{{$dados->nome}}</p></div>
            <div class="col-md-2"><small><b>Data de Nascimento:</b></small> <p>{{date('d/m/Y', strtotime($dados->dt_nasc))}}</p></div>
            <div class="col-md-2"><small><b>Nacionalidade:</b></small><p>{{$dados->nacionalidade}}</p></div>
            <div class="col-md-2"><small><b>Naturalidade:</b></small> <p>{{$dados->naturalidade}}</p></div>
            <div class="col-md-2"><small><b>Sexo:</b></small> <p>{{$dados->sexo == 'F' ? 'Feminino' : 'Masculino'}}</p></div>
          </div>
          <div class="row">
            <div class="col-md-2"><small><b>Cpf:</b></small> <p>{{$dados->cpf}}</p></div>
            <div class="col-md-2"><small><b>RG:</b></small> <p>{{$dados->rg}}</p></div>
            <div class="col-md-2"><small><b>Orgão Emissor:</b></small><p>{{$dados->orgao_emissor}}</p></div>
            <div class="col-md-2"><small><b>Dt. Emissão:</b></small> <p>{{date('d/m/Y', strtotime($dados->dt_emissor))}}</p></div>      
          </div>
          <div class="row">
            <div class="col-md-2"><small><b>Email:</b></small> <p>{{$dados->email}}</p></div>
            <div class="col-md-2"><small><b>Telefone:</b></small> <p>{{$dados->telefone}}</p></div>
          </div>
      </div>
      <div class="callout callout-success">
        <b>Endereço</b>
        <div class="row">      
            <div class="col-md-4"><small><b>Rua:</b></small> <p>{{$dados->rua}}</p></div>
            <div class="col-md-1"><small><b>Nº:</b></small><p>{{$dados->numero}}</p></div>
            <div class="col-md-4"><small><b>Complemento:</b></small> <p>{{$dados->complemento}}</p></div>      
          </div>
            <div class="row">        
                <div class="col-md-4"><small><b>Bairro:</b></small> <p>{{$dados->bairro}}</p></div>
                <div class="col-md-4"><small><b>Cidade:</b></small> <p>{{$dados->cidade}}</p></div>
                <div class="col-md-2"><small><b>Estado:</b></small><p>{{$dados->estado}}</p></div>
                <div class="col-md-3"><small><b>Cep:</b></small> <p>{{$dados->cep}}</p></div>
            </div>
      </div>
        <div class="callout callout-warning">            
                <b>Localização aproximada</b>
                <div class="row">
                    <div class="col-sm-12">
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAJoo7VgzjxM4BPcD3QNy0S3AX21_XzGhA&q={{htmlspecialchars($dados->rua.','.$dados->numero.','.$dados->bairro.','.$dados->cidade.','.$dados->estado.','.$dados->cep)}}" 
                          width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>        
                      </div>
                </div>            
        </div>