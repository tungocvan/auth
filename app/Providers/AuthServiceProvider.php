<?php

namespace App\Providers;

use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use App\Policies\GroupPolicy;
use Modules\Auth\src\Models\User;
use Modules\Posts\src\Models\Posts;
use Illuminate\Support\Facades\Gate;
use Modules\Groups\src\Models\Groups;
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
        User::class => UserPolicy::class,
        Groups::class => GroupPolicy::class,
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
