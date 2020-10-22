<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('Administrador','App\Policies\UserProfile@Administrador');
        Gate::define('AssistenteSocial','App\Policies\UserProfile@AssistenteSocial');
        Gate::define('Comissao','App\Policies\UserProfile@Comissao');
        Gate::define('Supervisao','App\Policies\UserProfile@Supervisao');
        Gate::define('Root','App\Policies\UserProfile@Root');
        Gate::define('Filial','App\Policies\UserProfile@Filial');
    }
}
