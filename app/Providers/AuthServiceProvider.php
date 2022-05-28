<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if (! $this->app->routesAreCached()) {
            //Passport::routes();
        }


        Passport::tokensCan([
            'corporations' => 'Corporaciones',
            'companies' => 'Companies',
            'contracts' => 'Contracts',
            'contacts' => 'Contacts',
            'documents' => 'Documents',
            'corporation-document' => 'Corporation Documents',
            'users' => 'Usuarios',
        ]);
    }
}
