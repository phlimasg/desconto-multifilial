<!-- The Modal -->
<div class="modal fade" id="opcoes">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
            <form action="{{ route('processoOpcoes.store', ['filial'=>$filial->url,'processo'=>$processo->url]) }}" method="POST">
            <input type="hidden" name="processo_id" value="{{$processo->id}}">
                @csrf
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Adicionar opções</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="">Renda Ini.</label>
                            <input type="text" name="renda_ini" value="{{old('renda_ini')}}" id="" class="form-control @error('renda_ini') is-invalid  @enderror" data-mask="#.##0,00" data-mask-reverse="true">
                            @error('renda_ini')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <label for="">Renda Fim.</label>
                            <input type="text" name="renda_fim" value="{{old('renda_fim')}}" id="" class="form-control @error('renda_fim') is-invalid  @enderror" data-mask="#.##0,00" data-mask-reverse="true">
                            @error('renda_fim')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <label for="">Vagas</label>
                            <input type="text" name="vagas" value="{{old('vagas')}}" id="" class="form-control @error('vagas') is-invalid  @enderror" data-mask="###0" data-mask-reverse="true">
                            @error('vagas')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <label for="">Desconto</label>
                        <input type="text" name="percentual" id="" value="{{old('percentual')}}" class="form-control @error('percentual') is-invalid  @enderror" data-mask="###0%" data-mask-reverse="true">
                            @error('percentual')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
                
            </form>  
        </div>
    </div>
</div>