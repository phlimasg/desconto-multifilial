<?php

namespace App\Providers;

use App\Models\Admin\Aluno;
use App\Models\Admin\Filial;
use App\Models\Admin\Importacao;
use App\Models\Admin\Processo;
use App\Observers\AlunoObserver;
use App\Observers\FilialObserver;
use App\Observers\ImportacaoObserver;
use App\Observers\ProcessoObserver;
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
        Importacao::observe(ImportacaoObserver::class);
        Aluno::observe(AlunoObserver::class);
        Schema::defaultStringLength(191);
    }
}

