<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SBD - La Salle</title>
    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
                       

    <!-- Adicionando Javascript -->

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('styles/publico.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    <!-- Font Awesome JS
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
     -->
     <script src="https://use.fontawesome.com/53400f1b88.js"></script>
</head>

<body>
  <style>   
    body{
      background-size: cover !important;
      background-repeat: no-repeat;
      color: white;
      background: url({{asset('img/background.jpg')}});    
    }
    .list :hover{
      background-color:  #0c47ead5;      
      padding-left: 35px;
      transition: all 0.8s;      
    }
    ol li, ul li {
      padding-top: 35px;
      padding-bottom: 35px;
      list-style: none;
      font-size: 1.5rem;
    }
  </style>
  <div class="container-fluid">
    <div class="row" style="padding: 0px; ">
      <div class="col-md-4 " style="height: 100vh; background-color: rgba(255, 255, 255, 0.8); background-image: linear-gradient(to right, #ea990c 0%, #ea7a0c 100%);">
        <div class="row ml-4 mt-3">
          <div class="col-md-12">
            <img src="https://www.unilasalle.edu.br/assets/img/marcacao/logo.png" alt="" class="img-responsive">            
          </div>
        </div>
        <div class="row ml-4 mt-3  mr-4">
          <div class="col-md-12">
            <h2 style="font-family: Arial, Helvetica, sans-serif">SELECIONE A FILIAL DE ORIGEM:</h2> 
            <select name="filial" id="filial" onchange="ListarProcessos()" class="form-control" style="height: 60px !important; font-size: 1.3rem;">
              <option value=""></option>
              @foreach ($filial as $i)
              <option value="{{$i->url}}">{{$i->nome}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-8" style="background-image: linear-gradient(to left, #141fff49 0%, #0033da63 100%); ">
        <div class="row mt-5">
          <div class="col-md-12" style="padding: 0px">
            <ul id="abertos" class="list">
              <li>
                <a href="#"> PROCESSO 1</a>
              </li>
              <li>
                <a href="#"> PROCESSO 2</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" style="padding: 0px">
            <ul class="list" id="encerrados">
              <li>
                <a href="#"> PROCESSO ENCERRADo</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
    
  <script>
    function ListarProcessos() {
      var filial = $('#filial').val();
      const date = new Date();
      console.log(' Hora atual: ' + date.toDateString());
      $.get("/"+filial, function(data, status){
        data = jQuery.parseJSON(data);
        $("#abertos").empty();
        $("#encerrados").empty();
        $.each(data, function(index, value){
          console.log( index + ' : ' + value.periodo_fim);
          if(date.getTime() > new Date(value.periodo_fim).getTime())
          $("#encerrados").append('<li><a href="'+filial +'/' +value.url+'">Encerrado - '+value.nome+'</a></li>');
          else
          $("#abertos").append('<li><a href="'+filial +'/' +value.url+'">'+value.nome+'</a></li>');
        });
          //alert("Data: " + data + "\nStatus: " + status);
      });
    }
  </script>
</body>
</html>