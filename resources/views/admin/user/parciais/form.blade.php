<form action="{{$data['input'] ? route($data['rota'],['input' => $data['input']->id ]) : route($data['rota']) }}" method="POST">
  @csrf          
  @method($data['metodo'])
  <div class="card-body">    
    <div class="row">
          <div class="col-sm-4">
          <label for="">Nome do usuário</label>
          <input type="text" name="name" class="form-control" value="{{$data['input'] ? $data['input']->name : ''}}">
          @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>                 
          <div class="col-sm-5">
            <label for="">Email</label>  
            <input type="text" name="email" class="form-control" value="{{$data['input'] ? $data['input']->email : ''}}">
            @error('email')
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
     