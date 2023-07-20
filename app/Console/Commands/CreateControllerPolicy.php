<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
class CreateControllerPolicy extends Command
{
    protected $signature = 'create:conPolicy {name}';

    protected $description = 'Create a new Controller for policy';

    public function handle()
    {
         $moduleRoute = $this->argument('name');
         $module = ucfirst($moduleRoute);
         $controllerName = $module."Controller.php";
         $conPath = base_path("app/Console/Commands/controllers/ModuleController.php");
         if (File::exists($conPath)) {
             $destCon = "modules/$module/src/Http/Controllers/".$controllerName;
             File::copy($conPath, $destCon);
             
             $content = file_get_contents($destCon);
             $find = 'moduleName';
             $content = str_replace($find,$module,$content);
             file_put_contents($destCon, $content); 
             
             $content = file_get_contents($destCon);
             $find = 'moduleRoute';
             $content = str_replace($find,$moduleRoute,$content);
             file_put_contents($destCon, $content); 


             $this->info("Create Controller policy success !!!");
         }
         // if (File::exists($viewPath)) {
         //      $sourceView = $viewPath ."/module.blade.php";
         //      if (File::exists($sourceView)){
         //         $destView = "modules/$module/resources/views/".$viewName;
         //         File::copy($sourceView, $destView);
         //         $content = file_get_contents($destView);
         //         $find = 'Module';
         //         $content = str_replace($find,$module,$content);
         //         file_put_contents($destView, $content);                 
         //      }
         //      $sourceView = $viewPath ."/menu.blade.php";
         //      if (File::exists($sourceView)){
         //         $destView = "modules/$module/resources/views/menu.blade.php";
         //         File::copy($sourceView, $destView);
         //         $content = file_get_contents($destView);
         //         $find = 'module';
         //         $content = str_replace($find,$this->argument('name'),$content);
         //         file_put_contents($destView, $content);     

         //         $sourceView = $viewPath ."/list.blade.php"; 
         //         $destView = "modules/$module/resources/views/list.blade.php";
         //         File::copy($sourceView, $destView); 

         //         $sourceView = $viewPath ."/edit.blade.php";
         //         $destView = "modules/$module/resources/views/edit.blade.php";
         //         File::copy($sourceView, $destView);

         //         $sourceView = $viewPath ."/add.blade.php";   
         //         $destView = "modules/$module/resources/views/add.blade.php";
         //         File::copy($sourceView, $destView);           
         //      }
         // }
       

    }

  
}
