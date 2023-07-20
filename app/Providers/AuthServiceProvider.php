<?php

namespace App\Providers;

use Modules\Banhang\src\Models\Banhang;
use Modules\Banhang\Policies\BanhangPolicy;


use Modules\Website\src\Models\Website;
use Modules\Website\Policies\WebsitePolicy;


use Modules\Auth\src\Models\User;
use Modules\Posts\src\Models\Posts;
use Illuminate\Support\Facades\Gate;
use Modules\Groups\src\Models\Groups;
use Modules\Posts\Policies\PostPolicy;
use Modules\Users\Policies\UserPolicy;
use Modules\Groups\Policies\GroupPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */

    protected $policies = [
		Banhang::class => BanhangPolicy::class,
		Website::class => WebsitePolicy::class,		     
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
