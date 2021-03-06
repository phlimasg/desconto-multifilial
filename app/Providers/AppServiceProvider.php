<?php

namespace App\Providers;

use App\Models\Admin\Aluno;
use App\Models\Admin\Analise;
use App\Models\Admin\DescontoHistorico;
use App\Models\Admin\Filial;
use App\Models\Admin\Importacao;
use App\Models\Admin\MensagemInterna;
use App\Models\Admin\MensagemUsuario;
use App\Models\Admin\Processo;
use App\Models\Admin\ProcessosOpcoes;
use App\Models\Admin\UserFilial;
use App\Observers\AlunoObserver;
use App\Observers\AnaliseObserver;
use App\Observers\DescontoHistoricoObserver;
use App\Observers\FilialObserver;
use App\Observers\ImportacaoObserver;
use App\Observers\MensagemInternaObserver;
use App\Observers\MensagemUsuarioObserver;
use App\Observers\ProcessoObserver;
use App\Observers\ProcessoOpcoesObserver;
use App\Observers\UserFilialObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Filial::observe(FilialObserver::class);
        Processo::observe(ProcessoObserver::class);
        ProcessosOpcoes::observe(ProcessoOpcoesObserver::class);
        Importacao::observe(ImportacaoObserver::class);
        Aluno::observe(AlunoObserver::class);
        Analise::observe(AnaliseObserver::class);
        MensagemInterna::observe(MensagemInternaObserver::class);
        MensagemUsuario::observe(MensagemUsuarioObserver::class);
        UserFilial::observe(UserFilialObserver::class);
        DescontoHistorico::observe(DescontoHistoricoObserver::class);
        Schema::defaultStringLength(191);
    }
}

