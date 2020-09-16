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
            <b>Data de criação</b> <a class="float-right">{{$user->created_at}}</a>
          </li>
          <li class="list-group-item">
            <b>Último acesso</b> <a class="float-right">{{$user->updated_at}}</a>
          </li>
        </ul>

        <a href="#" class="btn btn-danger btn-block"><b><i class="fa fa-trash"></i> Remover usuário</b></a>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->    
  </div>
  <div class="col-md-9">
    <div class="card card-primary card-outline">
      <div class="card-header">
        Filiais com acesso
        <div class="card-tools">
          <a href="http://" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Adicionar acesso</a>
        </div>
      </div>
      <div class="card-body">
            @forelse ($user->userFilial as $i)
                
            @empty
                Nenhuma filial cadastrada para esse usuário.
            @endforelse 
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
@stop