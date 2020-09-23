
  <!-- The Modal -->
  <div class="modal fade" id="addDespesa">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="formdespesas" action="{{ route('pDespesasEReceitas.store', ['filial'=>$filial,'processo'=>$processo->url]) }}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="public_resp_fin_id" value="{{$dados->pResponsavelFinanceiro->id}}">
          <input type="hidden" name="public_aluno_id" value="{{$dados->id}}">
          <input type="hidden" name="tipo" value="despesa">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Adicionar Despesas</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-3">
                <label for="">Descricao</label>
                <select name="descricao" id="" class="form-control">
                  <option value=""></option>
                  <option value="Gasto com Aluguel">Gasto com Aluguel</option>
                  <option value="Condomínio">Condomínio</option>
                  <option value="Parcela do Financiamento de Imóvel">Parcela do Financiamento de Imóvel</option>
                  <option value="Despesas com IPVA/Combustível/Seguro">Despesas com IPVA/Combustível/Seguro</option>
                  <option value="Conta de Água">Conta de Água</option>
                  <option value="Conta de Luz">Conta de Luz</option>
                  <option value="Gás">Gás</option>
                  <option value="Telefone">Telefone</option>
                  <option value="Internet">Internet</option>
                  <option value="Alimentação">Alimentação</option>
                  <option value="atura do Cartão de Crédito">Fatura do Cartão de Crédito</option>
                  <option value="Medicamentos">Medicamentos</option>
                  <option value="Plano de Saúde">Plano de Saúde</option>
                  <option value="Curso de idiomas">Curso de idiomas</option>
                  <option value="Mensalidade de escola">Mensalidade de escola</option>
                  <option value="Mensalidade com faculdade/universidade">Mensalidade com faculdade/universidade</option>
                  <option value="Outros">Outros</option>
              </select> 
                @error('descricao')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="col-sm-3">
                <label for="">Valor</label>
                <input type="text" name="valor" id="" class="form-control" data-mask="###.##0,00" data-mask-reverse="true">
                @error('valor')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="col-sm-3">
                <label for="">Observação</label>
                <input type="text" name="observacao" id="" class="form-control">
                @error('observacao')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>              
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label for="">Comprovantes:</label>
                <input type="file" name="documentos[]" id="" class="form-control" multiple accept="image/jpg, image/jpeg, application/pdf" required>
                @error('documentos.*')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            </div>
          </div>
    
          <!-- Modal footer -->
          <div class="modal-footer">
            <button id="btndespesas" type="submit" class="btn btn-danger btn-block">Adicionar despesas</button>
          </div>
        </div>    
      </form>  
      
    </div>
  </div>