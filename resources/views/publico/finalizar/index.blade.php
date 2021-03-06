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
    <div class="">
        
      <div style="width: 100%; background-color: #004aba; padding: 10px" cla>
        <div class="container">
          <img src="http://lasalle.edu.br/public/uploads/images/abel/5af5fc44d4812(BRANCA-HORIZONTAL)_Abel.png" alt="" width="200px">
        </div>
      </div>
        
          <div class="container " style="color: white;">
            <br>
            <div>
                <h3>Dados recebidos com sucesso!</h3>
    
                <p style="color: white;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Informamos que recebemos todos os seus dados e em breve retornaremos com mais informações para que você acompanhe o passo a passo do andamento da sua solicitação.</p>
                <br>
                <p style="color: white;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Agradecemos a confiança e parceria.</p>
    
                <div style="text-align: right">
                    <p style="color: white;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Atenciosamente,<br>
    
                        Colégio La Salle Abel</p>
                </div>
            </div>        
            
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
</body>

</html>