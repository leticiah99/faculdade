<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */  
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
       // \App\Models\TipoServicos::class => \App\Policies\TipoServicosPolicy::class,
    ];

    /** 
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();
   
        // define o user admin 
        Gate::define('isAdmin', function($user) {
           return $user->role == 'Admin';
        });
       
        // define o user do tipo funcionário 
        Gate::define('isFuncionário', function($user) {
            return $user->role == 'Funcionário';
        });  
    }
} 

