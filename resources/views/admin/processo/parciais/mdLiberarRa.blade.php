<!-- The Modal -->

<div class="modal fade" id="liberarRa{{$i->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
            <form action="{{ route('processo.liberarRa', ['filial'=>$filial->url]) }}" method="POST">
                <input type="hidden" name="processo_id" value="{{$i->id}}">
                @csrf
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Liberar RA/Matrícula/ID - {{$i->nome}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 text-justify">
                            <span>Após encerrado o processo, você pode liberar apenas 1 aluno/candidato para fazer o processo sem ter que reabri-lo para todo o mundo. <br>
                                Basta adicionar o RA/Matricula/ID do aluno no campo abaixo e salvar.</span>
                                <p><span class="text-danger">*Alunos/candidatos já participantes, só acessarão o processo se o status for <b>Falta Documento</b>.</span> </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Ra/Matricula/Id</label>
                            <input type="text" name="ra" id="" class="form-control @error('ra') is-invalid  @enderror" placeholder="Somente números">
                            @error('ra')
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