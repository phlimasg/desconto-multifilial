<form action="{{$data['input'] ? route($data['rota'],['filial' => $filial,'input' => $data['input']->id ]) : route($data['rota'],['filial' => $filial]) }}" method="POST">
          @csrf          
          @method($data['metodo'])
          <input type="hidden" name="filial" value="{{$filial}}">
          <div class="card-body">    
            <div class="row">
                 <div class="col-sm-6">
                  <label for="">Nome do processo</label>
                  <input type="text" name="nome" class="form-control" value="{{$data['input'] ? $data['input']->nome : ''}}">
                  @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div> 
                  <div class="col-sm-6">
                    <label for="">Tipo</label>                  
                  <select name="tipo" id="" class="form-control">
                    <option value=""></option>
                    <option {{old('tipo')=='bolsa' ? 'selected' : $data['input']=='bolsa' ? 'selected' : ''}} value="bolsa">Bolsa Social</option>
                    <option {{old('tipo')=='comercial' ? 'selected' : $data['input']=='comercial' ? 'selected' : ''}} value="comercial">Desconto Comercial</option>
                  </select>
                  @error('tipo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
            </div>       
                <div class="row">
                  <div class="col-sm-2">
                    <label for="">Data de liberação:</label>  
                    <input type="date" name="periodo_ini" class="form-control" value="{{$data['input'] ? $data['input']->periodo_ini : ''}}">
                    @error('periodo_ini')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div> 
                  <div class="col-sm-2">
                    <label for="">Hora de liberação:</label>  
                    <input type="time" name="hora_ini" class="form-control" value="{{$data['input'] ? $data['input']->hora_ini : ''}}">
                    @error('hora_ini')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-sm-2">
                    <label for="">Data de finalização:</label>  
                    <input type="date" name="periodo_fim" class="form-control" value="{{$data['input'] ? $data['input']->periodo_fim : ''}}">
                    @error('periodo_fim')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div> 
                  <div class="col-sm-2">
                    <label for="">Hora de finalização:</label>  
                    <input type="time" name="hora_fim" class="form-control" value="{{$data['input'] ? $data['input']->hora_fim : ''}}">
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
     