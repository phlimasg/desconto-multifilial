<!-- The Modal -->

<div class="modal fade" id="modalAdicionarAluno{{$i->id}}">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content">
            <form action="{{ route('alunos.store', ['filial'=>$filial->url,'processo'=>$i->id]) }}" method="POST">
                <input type="hidden" name="processo_id" value="{{$i->id}}">
                @csrf
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Adicionar Aluno ao processo {{$i->nome}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">                    
                    <div class="row">
                        <div class="col-md-2">
                            <label for="">Ra/Matricula/Id</label>
                        <input type="text" name="ra" id="" class="form-control @error('ra') is-invalid  @enderror" placeholder="Somente números" value="{{old('ra')}}">
                            @error('ra')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">Nome</label>
                        <input type="text" name="nome_aluno" id="" class="form-control @error('nome_aluno') is-invalid  @enderror" placeholder="Nome do Aluno" value="{{old('nome_aluno')}}">
                            @error('nome_aluno')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="">Se o processo finalizou, libere a inscrição por 48h.</label>
                            <div class="checkbox">
                                <label><input type="checkbox" name="liberar_ra" value="1"> Liberar inscrição</label>
                              </div>                        
                                @error('nome_aluno')
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