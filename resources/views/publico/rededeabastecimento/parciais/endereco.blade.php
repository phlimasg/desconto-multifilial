<h5>Endereço</h5>
    <div class="row">
      <div class="col-sm-2">
        <label for="">CEP:</label>
        <input type="text" name="cep" class="form-control" id="cep" placeholder="" data-mask="00000-000" value="{{old('cep') ? old('cep') : $dados->cep}}">        
        @error('cep')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-3">
        <label for="">Rua:</label>
        <input type="text" name="rua" id="rua" class="form-control" placeholder="" value="{{old('rua') ? old('rua') : $dados->rua}}">        
        @error('rua')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-1">
        <label for="">Num.:</label>
        <input type="text" name="numero" id="" class="form-control" placeholder="" data-mask="####0" value="{{old('numero') ? old('numero') : $dados->numero}}">        
        @error('numero')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-4">
        <label for="">Complemento:</label>
        <input type="text" name="complemento" id="" class="form-control" placeholder="" value="{{old('complemento') ? old('complemento') : $dados->complemento}}">        
        @error('complemento')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>      
    </div>
    <div class="row">
      <div class="col-sm-2">
        <label for="">Bairro:</label>
        <input type="text" name="bairro" id="bairro" class="form-control" placeholder="" value="{{old('bairro') ? old('bairro') : $dados->bairro}}">        
        @error('bairro')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-2">
        <label for="">Cidade:</label>
        <input type="text" name="cidade" id="cidade" class="form-control" placeholder="" value="{{old('cidade') ? old('cidade') : $dados->cidade}}">        
        @error('cidade')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-2">
        <label for="">Estado:</label>
        <input type="text" name="estado" id="uf" class="form-control" placeholder="" value="{{old('estado') ? old('estado') : $dados->estado}}">        
        @error('estado')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div>

    <script>

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>