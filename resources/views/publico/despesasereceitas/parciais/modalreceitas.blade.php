<div class="modal fade" id="addReceita">
    <div class="modal-dialog modal-lg">
        <form id="formreceitas" method="POST" action="{{ route('pDespesasEReceitas.store', ['filial'=>$filial,'processo'=>$processo->url]) }}" enctype="multipart/form-data">
            <div class="modal-content">            
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Adicionar receita</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @csrf        
                <input type="hidden" name="processo_id" value="">
                <input type="hidden" name="public_aluno_id" value="{{$dados->id}}">
                <input type="hidden" name="tipo" value="receita">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="">Descricao</label>
                        <select name="descricao" id="" class="form-control">
                            <option value=""></option>
                            <option value="Pensão alimenticia recebida">Pensão alimenticia recebida</option>
                            <option value="Ajuda de familiares">Ajuda de familiares</option>
                            <option value="Recebimento de aluguéis">Recebimento de aluguéis</option>
                            <option value="Rendimento de investimentos">Rendimento de investimentos</option>
                            <option value="Bolsa Família">Bolsa Família</option>
                            <option value="BPC-LOAS">BPC-LOAS</option>
                            <option value="Renda Mínima">Renda Mínima</option>
                            <option value="Renda Cidadão">Renda Cidadão</option>
                            <option value="Bolsa Atleta">Bolsa Atleta</option>                            
                            <option value="Outros rendimentos">Outros rendimentos</option>
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
                        <label for="documentos">Comprovantes:</label>
                        <input type="file" name="documentos[]" id="" class="form-control" accept="image/jpg, image/jpeg, application/pdf" multiple required>                        
                        @error('documentos.*')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button id="btnreceitas" type="submit" class="btn btn-success btn-block">Adicionar Receita</button>
            </div>
            </div>    
        </form>
    </div>
</div>