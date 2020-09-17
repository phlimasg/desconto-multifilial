@extends('layout.publico')

@section('title', 'Desconto')

@section('content_header')
    
@stop

@section('content')
<form action="{{ route('pAluno.login', ['filial'=>$filial,'processo'=>$processo->url]) }}" method="post">
  @csrf
<input type="hidden" name="filial" value="{{$filial}}">
<input type="hidden" name="processo" value="{{$processo->url}}">
  <div class="login_ra">
    <div class="login_box text-center">
      
      <img src="https://lasalle.edu.br/public/uploads/images/abel/5af5fc44d4812(BRANCA-HORIZONTAL)_Abel.png" alt="" srcset="" style="max-width: 450px;  max-height: 100px">    
      <div class="row">
        <div class="col-sm-12 ">
          <label for="">Ra/Matricula/Id:</label>
        <input type="text" name="ra" id="" class="form-control" placeholder="Somente Números" value="{{old('ra')}}">
        @if (session('message'))
          <span class="text-danger">*{{session('message')}}</span>
        @endif
        </div>
      </div>  
      <div class="row">
        <div class="col-sm-12 ">
          <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-key"></i> Entrar</button>
        </div>
      </div>  
    </div>
  </div>
</form>
@stop

@section('css')
<style>
  #sidebar{
    display: none;
  }
  .navbar{
    display: none;
  }
  body{
    background-size: cover !important;
    background-repeat: no-repeat;
    background: url({{asset('img/background.jpg')}});    
  }
  .login_box{
    background-color: rgba(255, 255, 255, 0.3);
    padding: 15px;
    border-radius: 5px;     
  }
</style>
@stop

@section('js')
    
@stop