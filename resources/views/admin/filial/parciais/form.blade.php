<form action="{{$data['filial'] ? route($data['rota'],['filial' => $data['filial']->id ]) : route($data['rota']) }}" method="POST">
          @csrf          
          @method($data['metodo'])
          <div class="card-body">
               <div class="row">
                 <div class="col-sm-2">
                   <label for="">Cod. Filial</label>
                   <input type="text" name="codigo" class="form-control" value="{{$data['filial'] ? $data['filial']->codigo : ''}}">
                    @error('codigo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                 </div>
                 <div class="col-sm-6">
                  <label for="">Nome da Filial</label>
                  <input type="text" name="nome" class="form-control" value="{{$data['filial'] ? $data['filial']->nome : ''}}">
                  @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-4">
                    <label>Logo</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                          <i class="fa fa-image"></i> Selecionar
                        </a>
                      </span>
                      <input id="thumbnail" class="form-control" type="text" name="logo_url" value="{{$data['filial'] ? $data['filial']->logo_url : ''}}">
                    </div>
                  </div>                
                </div>
                @include('admin.filial.parciais.endereco')
                <div class="row">
                  <div class="col-sm-12">
                    <label for="">Descrição</label>  
                    <textarea name="descricao" id="" cols="30" rows="2" class="form-control">{{$data['filial'] ? $data['filial']->descricao : ''}}</textarea>
                    @error('descricao')
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
     