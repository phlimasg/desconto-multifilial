@if(!empty($processo))
<form action="{{route('processos.update',['filial' => $filial->url,'processo' => $processo->id ])}}" method="POST">
  @method('PUT')
@else
<form action="{{route('processos.store',['filial' => $filial->url])}}" method="POST">
@endif
          @csrf          
          
          <input type="hidden" name="filial" value="{{$filial->url}}">
          <div class="card-body">    
            <div class="row">
                 <div class="col-sm-6">
                  <label for="">Nome do processo:</label>
                  <input type="text" name="nome" class="form-control @error('nome') is-invalid  @enderror" value="{{old('nome') ? old('nome') : !empty($processo->nome) ? $processo->nome : ''}}">
                  @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div> 
                  <div class="col-sm-2">
                    <label for="">Tipo:</label>                  
                  <select name="tipo" id="" class="form-control @error('tipo') is-invalid  @enderror">
                    <option value=""></option>
                    <option {{old('tipo')=='bolsa' ? 'selected' : !empty($processo->tipo) && $processo->tipo == 'bolsa' ? 'selected' : ''}} value="bolsa">Bolsa Social</option>
                    <option {{old('tipo')=='comercial' ? 'selected' : !empty($processo->tipo)&& $processo->tipo == 'comercial' ? 'selected' : ''}} value="comercial">Desconto Comercial</option>
                  </select>
                  @error('tipo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-sm-4">
                    <label for="">E-mail para dúvidas e respostas automáticas:</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid  @enderror" value="{{!empty(old('email')) ? old('email') : !empty($processo->email) ? $processo->email : ''}}">
                    @error('email')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div> 
            </div>       
                <div class="row">
                  <div class="col-sm-2">
                    <label for="">Data de liberação:</label>  
                    <input type="date" name="periodo_ini" class="form-control @error('periodo_ini') is-invalid  @enderror" value="{{!empty(old('periodo_ini')) ? old('periodo_ini') : !empty($processo->periodo_ini) ? date("Y-m-d", strtotime($processo->periodo_ini)) : ''}}">
                    @error('periodo_ini')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div> 
                  <div class="col-sm-2">
                    <label for="">Hora de liberação:</label>  
                    <input type="time" name="hora_ini" class="form-control @error('hora_ini') is-invalid  @enderror" value="{{!empty(old('hora_ini')) ? old('hora_ini') : !empty($processo->periodo_ini) ? date("H:i", strtotime($processo->periodo_ini)) : ''}}">
                    @error('hora_ini')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-sm-2">
                    <label for="">Data de finalização:</label>  
                    <input type="date" name="periodo_fim" class="form-control @error('periodo_fim') is-invalid  @enderror" value="{{!empty(old('periodo_fim')) ? old('periodo_fim') : !empty($processo->periodo_fim) ? date("Y-m-d", strtotime($processo->periodo_fim)) : ''}}">
                    @error('periodo_fim')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div> 
                  <div class="col-sm-2">
                    <label for="">Hora de finalização:</label>  
                    <input type="time" name="hora_fim" class="form-control @error('hora_fim') is-invalid  @enderror" value="{{!empty(old('hora_fim')) ? old('hora_fim') : !empty($processo->periodo_fim) ? date("H:i", strtotime($processo->periodo_fim)) : ''}}">
                    @error('hora_fim')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>            
          </div>
          <!-- /.card-footer -->
        </form>
     