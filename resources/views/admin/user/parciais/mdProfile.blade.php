<!-- The Modal -->
<div class="modal fade" id="permissoes">
    <div class="modal-dialog">
      <div class="modal-content">
    <form action="{{ route('usuarios.update', ['usuario'=>$user->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    
                    <label for="">Filial</label>
                    <select class="js-example-basic-multiple" name="filial[]" multiple="multiple">
                        @can('Root', Auth::user())
                        @foreach (App\Models\Admin\Filial::get() as $i)
                        <option value="{{$i->id}}">{{$i->codigo}} - {{$i->nome}}</option>
                        @endforeach
                        @else
                        @foreach (App\Models\Admin\Filial::whereIn('id',
                        App\Models\Admin\UserFilial::where('user_id',Auth::user()->id)->select('filial_id')->get()                        
                        )->get() as $i)
                            <option value="{{$i->id}}">{{$i->codigo}} - {{$i->nome}}</option>
                            @endforeach
                            @endcan
                            
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Perfil</label>
                        <select class="js-example-basic-multiple" name="perfil[]" multiple="multiple">
                            @can('Root', Auth::user())
                            @foreach (App\Models\Admin\Profile::get() as $i)
                            <option value="{{$i->id}}">{{$i->nome}}</option>
                            @endforeach
                            @elsecan('Administrador', Auth::user())
                            @foreach (App\Models\Admin\Profile::where('nome','!=','Root')->get() as $i)
                            <option value="{{$i->id}}">{{$i->nome}}</option>
                            @endforeach
                    @else
                    @foreach (App\Models\Admin\Profile::whereIn('id',
                        App\Models\Admin\UserFilial::where('user_id',Auth::user()->id)->select('profile_id')->get()                        
                        )->get() as $i)
                            <option value="{{$i->id}}">{{$i->nome}}</option>
                        @endforeach
                        @endcan
                    </select>
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

@section('js')
@include('parciais.alert')
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection