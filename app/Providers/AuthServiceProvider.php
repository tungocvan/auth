<?php

namespace App\Providers;

use App\Policies\PostPolicy;
use Modules\Posts\src\Models\Posts;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    // protected $policies = [
    //     // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    // ];

    protected $policies = [
        Posts::class => PostPolicy::class,
    ] ;
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
