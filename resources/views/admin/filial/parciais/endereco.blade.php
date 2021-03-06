    <div class="row">
      <div class="col-sm-2">
        <label for="">CEP:</label>
        <input type="text" name="cep" class="form-control" id="cep" placeholder="" data-mask="00000-000" value="{{old('cep') ? old('cep') : ''}}">        
        @error('cep')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-3">
        <label for="">Rua:</label>
        <input type="text" name="rua" id="rua" class="form-control" placeholder="" value="{{old('rua') ? old('rua') : ''}}">        
        @error('rua')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-1">
        <label for="">Num.:</label>
        <input type="text" name="numero" id="" class="form-control" placeholder="" data-mask="####0" value="{{old('numero') ? old('numero') : ''}}">        
        @error('numero')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>        
      <div class="col-sm-2">
        <label for="">Bairro:</label>
        <input type="text" name="bairro" id="bairro" class="form-control" placeholder="" value="{{old('bairro') ? old('bairro') : ''}}">        
        @error('bairro')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-2">
        <label for="">Cidade:</label>
        <input type="text" name="cidade" id="cidade" class="form-control" placeholder="" value="{{old('cidade') ? old('cidade') : ''}}">        
        @error('cidade')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="col-sm-2">
        <label for="">Estado:</label>
        <input type="text" name="estado" id="uf" class="form-control" placeholder="" value="{{old('estado') ? old('estado') : ''}}">        
        @error('estado')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div>

   