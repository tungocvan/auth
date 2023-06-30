<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateMiddlewareCommand extends Command
{
    protected $signature = 'create:middleware {name} {path}';

    public function handle()
    {
        $middlewareName = $this->argument('name');

        $nameModule = ucfirst($this->argument('path'));
        $middlewarePath = "modules/{$nameModule}/src/Http/Middlewares";

        if (!is_dir($middlewarePath)) {
            $this->error('Directory not found!');
            return;
        }

        $this->call('make:middleware', [
            'name' => $middlewareName,
        ]);

        $this->info("Middleware {$middlewareName} created successfully!");

        $middlewareFile = app_path("Http/Middleware/{$middlewareName}.php");
        $newMiddlewareFile = $middlewarePath . "/{$middlewareName}.php";

        if (!file_exists($middlewareFile)) {
            $this->error('Middleware file not found!');
            return;
        }

        if (file_exists($newMiddlewareFile)) {
            $this->error('Middleware file already exists!');
            return;
        }

        $result = rename($middlewareFile, $newMiddlewareFile);
        if ($result) {
            // thay đổi nội dung middleware
            $content = file_get_contents($newMiddlewareFile);
            $newNamespace = str_replace('/', '\\', $middlewarePath);
            $content = str_replace('namespace App\Http\Middleware;', "namespace {$newNamespace};", $content);
            file_put_contents($newMiddlewareFile, $content);
            $foundString = '        return $next($request);';
            $newString = "        echo 'middleware {$nameModule}' ;\n";
            $content = str_replace($foundString, $newString . $foundString, $content);
            file_put_contents($newMiddlewareFile, $content);
            $this->info("Middleware {$middlewareName} moved to {$middlewarePath} successfully!");
        } else {
            $this->error('Error moving middleware file!');
        }
    }
}
