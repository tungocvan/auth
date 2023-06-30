<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class CreateAndMoveControllerCommand extends Command
{
    protected $signature = 'create:controller {controller} {directoryModule} {--resource}';

    protected $description = 'Create a controller file and move it to a specified directory';

    public function handle()
    {
        $controllerName = $this->argument('controller') . 'Controller';
        $nameModule = $this->argument('directoryModule');
        $directory = "modules/{$nameModule}/src/Http/Controllers";
        $controllerPath = app_path('Http/Controllers/' . $controllerName . '.php');
        $newControllerPath = $directory . '/' . $controllerName . '.php';
        $myoption = $this->option('resource');
        //dd($myoption);
        if (File::exists($newControllerPath)) {
            $this->error('Controller file already exists in directory');
            return;
        }

        if ($myoption) {
            Artisan::call('make:controller', ['name' => $controllerName, '--resource' => $myoption]);
        } else {
            Artisan::call('make:controller', ['name' => $controllerName]);
        }

        File::move($controllerPath, $newControllerPath);

        // Đọc nội dung file model
        $content = file_get_contents($newControllerPath);
        $newNamespace = str_replace('/', '\\', $directory);
        $content = str_replace('namespace App\Http\Controllers;', "namespace {$newNamespace};", $content);

        file_put_contents($newControllerPath, $content);

        $this->info('Controller file created and moved successfully');
    }
}
