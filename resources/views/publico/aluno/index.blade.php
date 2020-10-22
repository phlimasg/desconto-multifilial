<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>
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
    <div class="wrapper">
        
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid ">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary btn-fixed d-inline-block ml-auto">
                        <i class="fas fa-align-justify"></i>
                    </button>                    
                </div>
            </nav>
            <form action="{{ route('pAluno.login', ['filial'=>$filial,'processo'=>$processo->url]) }}" method="post" id="login">
              @csrf
            <input type="hidden" name="filial" value="{{$filial->url}}">
            <input type="hidden" name="processo" value="{{$processo->url}}">
              <div class="login_ra">
                <div class="login_box text-center">
                  
                  <img src="{{$filial->logo_url}}" alt="" srcset="" style="max-width: 450px;  max-height: 100px">    
                  <div class="row">
                    <div class="col-sm-12 ">
                      <label for="">Ra/Matricula/Id:</label>
                    <input type="text" name="ra" id="" class="form-control" placeholder="Somente Números" value="{{old('ra')}}">
                    @if (session('message'))
                    <div class="alert alert-danger">
                      <span >*{{session('message')}}</span>
                    </div>
                    @endif
                    </div>
                  </div>  
                  <div class="row">
                    <div class="col-sm-12 ">
                      <button type="submit" id="submit" class="btn btn-primary btn-block"><i class="fa fa-key"></i> Entrar</button>
                    </div>
                  </div>  
                </div>
              </div>
            </form>
            
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.mask.min.js')}}"></script> 
    <script type="text/javascript">
        $(document).ready(function () {
            var content = true;
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                if(content){
                    $('#conteudo').css("padding-left","0px");
                    content = false;
                }
                else{
                    $('#conteudo').css("padding-left","250px");
                    content = true;
                }

            });
        });
    </script>
    <script>
      $('#login').submit(function() {
        $('#submit').prop('disabled',true);
        $('#submit').html('<i class="fa fa-refresh fa-spin"></i> Aguarde...');
      });
    </script>

</body>

</html>