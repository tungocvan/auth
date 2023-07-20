<?php
namespace Modules;
use File;
//use Modules\ModuleServiceProvider;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function register()
    {
    }
    private $middlewares = [
        // add middleware
        'banhang.middleware' => \Modules\Banhang\src\Http\Middlewares\Banhang::class,
        'website.middleware' => \Modules\Website\src\Http\Middlewares\Website::class,
        'users.middleware' => \Modules\Users\src\Http\Middlewares\Users::class,
        'dashboard.middleware' => \Modules\Dashboard\src\Http\Middlewares\Dashboard::class,
        'modules.middleware' => \Modules\Modules\src\Http\Middlewares\Modules::class,
        'groups.middleware' => \Modules\Groups\src\Http\Middlewares\Groups::class,
        'posts.middleware' => \Modules\Posts\src\Http\Middlewares\Posts::class,
        'auth.middleware' => \Modules\Auth\src\Http\Middlewares\Auth::class,    
        'admin.middleware' => \Modules\Admin\src\Http\Middlewares\Admin::class,        
    ];
    private $commands = [
        // TestCommand::class
    ];
    public function boot()
    {
        // Đăng ký modules theo cấu trúc thư mục
        //$directories = array_map('basename' , File::directories( __DIR__)) ;
        $modules = $this->getModules();
        foreach ($modules as $module) {
            $this->registerModule($module);
        }

        // Middlewares
        $this->registerMiddlewares();
        //Commands
        //$this->commands($this->commands);
    }
    // Khai báo đăng ký cho từng modules
    private function registerModule($module)
    {
        $modulePath = __DIR__ . "/{$module}";
        // Khai báo thành phần ở đây
        // Khai báo route
        if (File::exists($modulePath . '/routes/routes.php')) {
            $this->loadRoutesFrom($modulePath . '/routes/routes.php');
        }

        // Khai báo migration
        // Toàn bộ file migration của modules sẽ tự động được load
        if (File::exists($modulePath . '/migrations')) {
            $this->loadMigrationsFrom($modulePath . '/migrations');
        }

        // Khai báo languages
        if (File::exists($modulePath . '/resources/lang')) {
            // Đa ngôn ngữ theo file php
            // Dùng đa ngôn ngữ tại file php resources/lang/en/general. php : @lang( ' Demo: : general. hello' ) Laravel Modules 4
            $this->loadTranslationsFrom($modulePath . '/resources/lang', $module);
            // Đa ngôn ngữ theo file j son
            $this->loadJSONTranslationsFrom($modulePath . '/resources/lang');
        }

        // Khai báo views
        // Gọi view thì ta sử dụng: view( ' Demo: : index' ) , @extends( ' Demo: : index' ) , @include( ' Demo: : index' )
        if (File::exists($modulePath . '/resources/views')) {
            $this->loadViewsFrom($modulePath . '/resources/views', $module);
        }

        // Khai báo helpers
        if (File::exists($modulePath . '/helpers')) {
            // Tất cả files có tại thư mục helpers
            $helper_dir = File::allFiles($modulePath . '/helpers');
            // khai báo helpers
            foreach ($helper_dir as $key => $value) {
                $file = $value->getPathName();
                require $file;
            }
        }
    }

    private function getModules()
    {
        $directories = array_map('basename', File::directories(__DIR__));
        return $directories;
    }
    private function registerConfig($module)
    {
    }
    private function registerMiddlewares()
    {
        if (!empty($this->middlewares)) {
            foreach ($this->middlewares as $key => $middleware) {
                $this->app['router']->pushMiddlewareToGroup($key, $middleware);
            }
        }
    }
}
