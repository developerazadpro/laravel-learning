<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\Order;
use App\Policies\CustomerPolicy;
use App\Policies\OrderPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Customer::class => CustomerPolicy::class,
        Order::class => OrderPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Define custom gate
        /* Gate::define('create_customer', function () {
            return Auth::user()->is_admin; //  Permitted if is_admin = 1;
        });
        Gate::define('create_order', function (){
            return Auth::user()->is_admin; //  Permitted if is_admin = 1;
        }); */
    }
}
