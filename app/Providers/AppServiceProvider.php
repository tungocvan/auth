<?php

namespace App\Providers;
use App\View\Components\collapse;
use App\View\Components\tabslot;
use App\View\Components\tabpanel;
use App\View\Components\form;
use App\View\Components\Input;
use App\View\Components\Editor;
use App\View\Components\CardText;

use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Modules\Users\Repositories\UsersRepository;
use Modules\Users\Repositories\UsersRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            UsersRepositoryInterface::class,
            UsersRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        Blade::component('package-collapse', collapse::class);
        Blade::component('package-tabslot', tabslot::class);
        Blade::component('package-tabpanel', tabpanel::class);
        Blade::component('package-form', form::class);
        Blade::component('package-input', Input::class);
        Blade::component('package-editor', Editor::class);
        Blade::component('package-card-text', CardText::class);                    
        Paginator::useBootstrap();
    }
}
