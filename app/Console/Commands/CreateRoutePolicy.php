<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
class CreateRoutePolicy extends Command
{
    protected $signature = 'create:route {name}';

    protected $description = 'Create a new route for policy';

    public function handle()
    {
         $module = ucfirst($this->argument('name'));
         $routesPath = base_path("app/Console/Commands/routes/routes.php");             
         if (File::exists($routesPath)) {
            $destRoutes = "modules/$module/routes/routes.php";
            File::copy($routesPath, $destRoutes);
            $content = file_get_contents($destRoutes);
            $find = 'nameModule';
            $content = str_replace($find,$module,$content);
            file_put_contents($destRoutes, $content);
            $content = file_get_contents($destRoutes);
            $find = 'routeName';
            $content = str_replace($find,$this->argument('name'),$content);
            file_put_contents($destRoutes, $content);
            $this->info("Create Route policy success !!!");
         }
       
    }

  
}
