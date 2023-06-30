<?php

namespace App\Console\Commands;
use File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
class Module extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Module CLI';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = ucfirst($this->argument('name'));
        if (File::exists(base_path('modules/' . $name))) {
            $this->error('Module da ton tai');
        } else {
            File::makeDirectory(base_path('modules/' . $name), 0755, true, true);
            // tạo thư mục configs
            $configFolder = base_path('modules/' . $name . '/configs');
            if (!File::exists($configFolder)) {
                File::makeDirectory($configFolder, 0755, true, true);
            }

            // tạo thư mục Helper
            $helperFolder = base_path('modules/' . $name . '/helper');
            if (!File::exists($helperFolder)) {
                File::makeDirectory($configFolder, 0755, true, true);
            }

            // tạo thư mục Migrations
            $migrationsFolder = base_path('modules/' . $name . '/migrations');
            if (!File::exists($migrationsFolder)) {
                File::makeDirectory($migrationsFolder, 0755, true, true);
            }
            // tạo thư mục Helpers
            $helpersFolder = base_path('modules/' . $name . '/helpers');
            if (!File::exists($helpersFolder)) {
                File::makeDirectory($helpersFolder, 0755, true, true);
            }

            // tạo thư mục Routes
            $routesFolder = base_path('modules/' . $name . '/routes');
            if (!File::exists($routesFolder)) {
                File::makeDirectory($routesFolder, 0755, true, true);
                // tạo file routes.php
                $routesFile = base_path('modules/' . $name . '/routes/routes.php');
                if (!File::exists($routesFile)) {
                    $routeName = strtolower($name);
                    $content = "<?php \n use Illuminate\Support\Facades\Route;";
                    $content .= "\n use Modules\\{$name}\\src\Http\Controllers\\{$name}Controller;";
                    $content .= "\n Route::prefix('/{$routeName}')->middleware('{$routeName}.middleware')->group(function(){";
                    $content .= "\n     Route::get('/', [{$name}Controller::class, 'index']);\n });";

                    File::put($routesFile, $content);
                }
            }
            
            /* tạo thư mục src */
            $srcFolder = base_path('modules/' . $name . '/src');
            if (!File::exists($srcFolder)) {
                File::makeDirectory($srcFolder, 0755, true, true);
                // tạo thư mục commands trong src
                $commandsFolder = base_path('modules/' . $name . '/src/Commands');
                File::makeDirectory($commandsFolder, 0755, true, true);
                // tạo thư mục http trong src
                $httpFolder = base_path('modules/' . $name . '/src/Http');
                File::makeDirectory($httpFolder, 0755, true, true);
                // tạo thư mục controllers trong Http
                $controllersFolder = base_path('modules/' . $name . '/src/Http/Controllers');
                File::makeDirectory($controllersFolder, 0755, true, true);
                Artisan::call('create:controller', [
                    'controller' => $name,
                    'directoryModule' => $name,
                    '--resource' => true,
                ]);
                $newControllerPath = $controllersFolder . '/' . $name . 'Controller.php';
                $content = file_get_contents($newControllerPath);
                $newContent = "use Illuminate\Http\Request;\nuse App\Http\Controllers\Controller;\n";
                $newContent .="use Modules\\$name\src\Models\\$name;" ;
                $content = str_replace(
                    'use Illuminate\Http\Request;',
                    $newContent,
                    $content
                );
                file_put_contents($newControllerPath, $content); 
                $methodName = strtolower($name);
                $content = file_get_contents($newControllerPath);
                $content = str_replace('//', "return view('{$name}::{$methodName}');", $content);
                file_put_contents($newControllerPath, $content);
                // tạo thư mục Middlewares trong src
                $middlewaresFolder = base_path('modules/' . $name . '/src/Http/Middlewares');
                File::makeDirectory($middlewaresFolder, 0755, true, true);
                Artisan::call('create:middleware', [
                    'name' => $name,
                    'path' => $name,
                ]);
                Artisan::call('update:middleware', [
                    'name' => $name,
                ]);

                // tạo thư mục models trong src
                $modelsFolder = base_path('modules/' . $name . '/src/Models');
                File::makeDirectory($modelsFolder, 0755, true, true);
                Artisan::call('create:model', [
                    'name' => $name,
                    'path' => $name,
                ]);
            }

            // tạo thư mục Resources
            $resourcesFolder = base_path('modules/' . $name . '/resources');
            if (!File::exists($resourcesFolder)) {
                File::makeDirectory($resourcesFolder, 0755, true, true);
                // tạo thư mục lang trong Resources
                $languageFolder = base_path('modules/' . $name . '/resources/lang');
                File::makeDirectory($languageFolder, 0755, true, true);
                // tạo thư mục views trong Resources
                $viewsFolder = base_path('modules/' . $name . '/resources/views');
                File::makeDirectory($viewsFolder, 0755, true, true);
                $viewName = strtolower($name);
                $viewFile = $viewsFolder . '/' . $viewName . '.blade.php';
                $content = "<h3>{$name} Module</h3>";
                File::put($viewFile, $content);
            }

            $this->info('Module tạo thành công');
        }
    }
}
