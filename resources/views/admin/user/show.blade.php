@extends('adminlte::page')

@section('title', 'Filiais')

@section('content_header')
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dados do usuário</h1>
        </div>        
      </div>
    </div><!-- /.container-fluid -->  
@stop

@section('content')
<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
        <img class="profile-user-img img-fluid img-circle" src="{{$user->profile_image ? $user->profile_image : asset('img/profile.png')}}" alt="User profile picture">
        </div>

        <h3 class="profile-username text-center">{{$user->name}}</h3>

        <p class="text-muted text-center">{{$user->email}}</p>

        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Criado em</b> <a class="float-right">{{date('d/m/Y H:i',strtotime($user->created_at))}}</a>
          </li>
          <li class="list-group-item">
            <b>Acessou em</b> <a class="float-right">{{date('d/m/Y H:i',strtotime($user->updated_at))}}</a>
          </li>
        </ul>

        <a href="#" class="btn btn-danger btn-block"><b><i class="fa fa-times"></i> Desativar usuário</b></a>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->    
  </div>
  <div class="col-md-9">
    <div class="card card-primary card-outline">
      <div class="card-header">
        Acessos
        <div class="card-tools">
          <a href="#" data-toggle="modal" data-target="#permissoes" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Adicionar acesso</a>
          @include('admin.user.parciais.mdProfile')
        </div>
      </div>
      <div class="card-body">
        <table class="table" id="table"> 
          <thead>
            <th scope="col">#</th>
            <th scope="col">Filial</th>
            <th scope="col">Perfil</th> 
            <th scope="col"></th> 
          </thead>
          <tbody>                 
          @forelse ($user->userFilial as $i)
          <tr>
            <td>{{$i->Filial->codigo}}</td>
            <td>{{$i->Filial->nome}}</td>
            <td>{{$i->Profile->nome}}</td>
          <td>
            <form action="{{route('usuarios.destroy', ['usuario'=>$i->id])}}" method="post">
              @method('delete')
              @csrf
              <input type="hidden" name="metodo" value="user_filial">
              <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
            </form>
          </td>
          </tr>  
          @empty
          Nenhuma filial cadastrada para esse usuário.
          @endforelse 
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
  @include('parciais.alert')
  <script>
    $('#table').DataTable({
      "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"
      }
    });    
  </script>
@stop