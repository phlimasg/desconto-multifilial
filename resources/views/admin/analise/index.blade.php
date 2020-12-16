@extends('adminlte::page')

@section('title', 'Processos')

@section('content_header')
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Listagem de Processos</h1>
        </div>
        <!--<div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Processo</a>
          </ol>
        </div>/.container-fluid --> 
      </div>
    </div>  
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-dark collapsed-card">
      <div class="card-header">
        <h3 class="card-title">Estatíticas do processo</h3>
  
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <span><i class="fas fa-minus"></i> Expandir/Fechar <i class="fas fa-minus"></i></span>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <canvas id="myChart"></canvas>
          </div>
          <div class="col-md-6">
            <canvas id="donut"></canvas>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>

<div class="row">
    <div class="col-12">
      <div class="card ">
        <!-- /.card-header -->
        <div class="card-body" >
          <table class="table table-hover" id="tabela">
            <thead>
              <tr>
                <th>ID</th>
                <th>RA</th>
                <th>Nome</th>
                <th>Status</th>
                <th>Concedido</th>                
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $i)
              <tr>
                <td>{{$i->id}}</td>
                <td>{{$i->ra}}</td>
                <td>{{$i->nome}}</td>
                <td>{{$i->status}}</td>
                <td>{{$i->desconto_deferido}}</td>                
                <td><a href="{{ route('analisar.show', ['filial'=>$filial->url,'processo'=>$processo->url,'analisar'=>$i->id]) }}" class="btn btn-primary"><i class="fa fa-eye"></i> Analisar</a></td>
                <td>                 
                </td>
              </tr>              
              @endforeach             
            </tbody>            
          </table>
        </div>
        <!-- /.card-body -->

        
      </div>
      <!-- /.card -->
    </div>
  </div>
@stop

@section('css')
@stop

@section('js')
    @include('parciais.alert')
    <script type="text/javascript" class="init">
      $(document).ready(function() {
        $('#tabela').DataTable();
      });

      var ctx = document.getElementById('myChart').getContext('2d');
      var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'bar',

          // The data for our dataset
          data: {
              labels: [@foreach($deferidos as $i)'{{$i->desconto_deferido}}',@endforeach
                ],
              datasets: [{
                  label: 'Deferidos',
                  backgroundColor: [@foreach($deferidos as $i)'rgb({{rand(0,255)}}, {{rand(0,255)}}, {{rand(0,255)}})',@endforeach],
                  borderColor: 'rgb(255, 245, 245)',
                  data: [@foreach($deferidos as $i){{$i->total}},@endforeach]
              }]
          },

          // Configuration options go here
          options: {}
      });

      var ctx = document.getElementById('donut').getContext('2d');
      var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'doughnut',

          // The data for our dataset
          data: {
              labels: [@foreach($falta as $i)'{{$i->status}}',@endforeach
                ],
              datasets: [{
                  label: 'Deferidos',
                  backgroundColor: [@foreach($falta as $i)'rgb({{rand(0,255)}}, {{rand(0,255)}}, {{rand(0,255)}})',@endforeach],
                  borderColor: 'rgb(255, 245, 245)',
                  data: [@foreach($falta as $i){{$i->total}},@endforeach]
              }]
          },

          // Configuration options go here
          options: {}
      });
    </script>
@stop