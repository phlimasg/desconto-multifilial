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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    @php
        $processo = App\Models\Admin\Processo::where('url',Request::segment(2))->first();
    @endphp
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
                    <a href="{{ route('pAluno.show', [
                        'filial'=>Request::segment(1),
                        'processo'=>Request::segment(2),
                        'pAluno'=> Request::segment(4),
                        ]) }}" >Dados do Aluno</a>
                </li>
                @if (App\Models\Publico\PublicAluno::where('ra',Request::segment(4))
                ->where('processo_id',
                    App\Models\Admin\Processo::where('url',Request::segment(2))->first()->id
                )->count()>0
                )
                    
                
                <li  @if (Request::segment(3) == 'pFiliacao') class="active" @endif>
                    <a href="{{ route('pFiliacao.show', [
                        'filial'=>Request::segment(1),
                        'processo'=>Request::segment(2),
                        'pFiliacao'=> Request::segment(4),
                        ]) }}" >Filiação</a>
                </li>
                <li @if (Request::segment(3) == 'pRespFin') class="active" @endif>
                    <a href="{{ route('pRespFin.show', [
                        'filial'=>Request::segment(1),
                        'processo'=>Request::segment(2),
                        'pRespFin'=> Request::segment(4),
                        ]) }}">Responsável Financeiro</a>
                </li>
                <li @if (Request::segment(3) == 'pComposicaoFamiliar') class="active" @endif>
                    <a href="{{ route('pComposicaoFamiliar.show', [
                        'filial'=>Request::segment(1),
                        'processo'=>Request::segment(2),
                        'pComposicaoFamiliar'=> Request::segment(4),
                        ]) }}">Composição Familiar</a>
                </li>
                @if($processo->tipo == 'bolsa' )
                <li @if (Request::segment(3) == 'pSituacaoHabitacional') class="active" @endif>
                    <a href="{{ route('pSituacaoHabitacional.show', [
                        'filial'=>Request::segment(1),
                        'processo'=>Request::segment(2),
                        'pSituacaoHabitacional'=> Request::segment(4),
                        ]) }}">Situação Habitacional</a>
                </li>
                <li @if (Request::segment(3) == 'pRedeDeAbastecimento') class="active" @endif>
                    <a href="{{ route('pRedeDeAbastecimento.show', [
                        'filial'=>Request::segment(1),
                        'processo'=>Request::segment(2),
                        'pRedeDeAbastecimento'=> Request::segment(4),
                        ]) }}">Rede de Abastecimento</a>
                </li>
                @endif
                @if (App\Models\Publico\PublicAluno::where('ra',
                Request::segment(4))
                    ->where('processo_id',
                        App\Models\Admin\Processo::where('url',Request::segment(2))->first()->id
                    )->first()->pResponsavelFinanceiro()->count()>0)                    
               
                <li @if (Request::segment(3) == 'pVeiculos') class="active" @endif>
                    <a href="{{ route('pVeiculos.show', [
                        'filial'=>Request::segment(1),
                        'processo'=>Request::segment(2),
                        'pVeiculo'=> Request::segment(4),
                        ]) }}">Bens Móveis</a>
                </li>
                @endif
                @if (App\Models\Publico\PublicAluno::where('ra',
                Request::segment(4))
                    ->where('processo_id',
                        App\Models\Admin\Processo::where('url',Request::segment(2))->first()->id
                    )->first()->pResponsavelFinanceiro()->count()>0)                    
               
                <li @if (Request::segment(3) == 'pDespesasEReceitas') class="active" @endif>
                    <a href="{{ route('pDespesasEReceitas.show', [
                        'filial'=>Request::segment(1),
                        'processo'=>Request::segment(2),
                        'pDespesasEReceita'=> Request::segment(4),
                        ]) }}">Despesas e Receitas</a>
                </li> 
                @endif  
                @endif             
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    @php
                    $aluno = App\Models\Publico\PublicAluno::where('ra',Request::segment(4))->where('processo_id',App\Models\Admin\Processo::where('url',Request::segment(2))->first()->id)->first();                    
                    @endphp
                    @if ($processo->tipo == 'bolsa')
                        @if ($aluno && 
                        $aluno->pResponsavelFinanceiro() && 
                        $aluno->pFiliacao()->first() && 
                        $aluno->pComposicaoFamiliar()->first() && 
                        $aluno->pResponsavelFinanceiro->pSituacaohabitacional && 
                        $aluno->pRedeDeAbastecimento                    
                        && $aluno->pDespesasEReceitas()->where('tipo','despesa')->count() > 0)
                        <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#finalizar"><i class="fas fa-save"></i> Finalizar Processo</a>                        
                        @endif
                    @elseif(
                        $aluno && 
                        $aluno->pResponsavelFinanceiro() && 
                        $aluno->pFiliacao()->first() && 
                        $aluno->pComposicaoFamiliar()->first()                 
                        && $aluno->pDespesasEReceitas()->where('tipo','despesa')->count() > 0 )
                        <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#finalizar"><i class="fas fa-save"></i> Finalizar Processo</a>
                    
                    @endif
            </li>
        </ul>        
        
        </nav>
        <!-- The Modal -->
        <div class="modal fade" id="finalizar">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Finalizar processo?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                <p>Ao finalizar o processo você está de acordo com os termos abaixo: </p>
                <p>Comprometo-me a prestar qualquer informação ou documentação complementar e autorizo que seja realizada, a qualquer tempo, visita domiciliar por profissional da área de Serviço Social designado(a) pela Direção da unidade de ensino na qual pleiteio bolsa social.</p>
                <!--<div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="chkfinalizar">De acordo
                    </label>
                  </div>-->
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                <form action="{{route('pFinalizar.store', [
                    'filial'=>Request::segment(1),
                    'processo'=>Request::segment(2),
                    'pFinalizar'=> Request::segment(4),
                    ])}}" method="post">
                    <input type="hidden" name="aluno" value="{{Request::segment(4)}}">
                    @csrf
                    <button type="submit" class="btn btn-success" id="btnFinalizar">Sim</button>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                </div>
        
            </div>
            </div>
        </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.mask.min.js')}}"></script>
    <script type="text/javascript">
            if ($("chkfinalizar").is(":checked")) {                
                $("btnFinalizar").prop('disable','false');
            }else{
                $("btnFinalizar").prop('disable','true');
            };
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
    @yield('js')
    
</body>

</html>