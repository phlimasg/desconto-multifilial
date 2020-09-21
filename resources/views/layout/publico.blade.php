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
    @yield('css')
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="nav-fixed">
            <div class="sidebar-header">
                <img src="http://lasalle.edu.br/public/uploads/images/abel/5af5fc44d4812(BRANCA-HORIZONTAL)_Abel.png" alt="" srcset="" width="100%">
            </div>

            <ul class="list-unstyled components">
                <!--<p>Dummy Heading</p>                -->
            <li @if (Request::segment(3) == 'pAluno') class="active" @endif>
                    <a href="#" >Dados do Aluno</a>
                </li>
                <li  @if (Request::segment(3) == 'pFiliacao') class="active" @endif>
                    <a href="#" >Filiação</a>
                </li>
                <li @if (Request::segment(3) == 'pRespFin') class="active" @endif>
                    <a href="#">Responsável Financeiro</a>
                </li>
                <li @if (Request::segment(3) == 'pComposicaoFamiliar') class="active" @endif>
                    <a href="#">Composição Familiar</a>
                </li>
                <li @if (Request::segment(3) == 'pSituacaoHabitacional') class="active" @endif>
                    <a href="#">Situação Habitacional</a>
                </li>
                <li @if (Request::segment(3) == 'pRededeAbastecimento') class="active" @endif>
                    <a href="#">Rede de Abastecimento</a>
                </li>
                <li @if (Request::segment(3) == 'pBensMoveis') class="active" @endif>
                    <a href="#">Bens Móveis</a>
                </li>
                <li @if (Request::segment(3) == 'pDespesaseReceitas') class="active" @endif>
                    <a href="#">Despesas e Receitas</a>
                </li>                
            </ul>
<!--
            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>
        -->
        </nav>
        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid ">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary btn-fixed d-inline-block ml-auto">
                        <i class="fas fa-align-justify"></i>
                    </button>                    
                </div>
            </nav>
            @yield('content')
            
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