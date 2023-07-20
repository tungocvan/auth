<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
class CreateView extends Command
{
    protected $signature = 'create:view {name}';

    protected $description = 'Create a new view for policy';

    public function handle()
    {
         $module = ucfirst($this->argument('name')); 
         $viewName = strtolower($module).".blade.php";
         $viewPath = base_path("app/Console/Commands/views");
         if (File::exists($viewPath)) {
              $sourceView = $viewPath ."/module.blade.php";
              if (File::exists($sourceView)){
                 $destView = "modules/$module/resources/views/".$viewName;
                 File::copy($sourceView, $destView);
                 $content = file_get_contents($destView);
                 $find = 'Module';
                 $content = str_replace($find,$module,$content);
                 file_put_contents($destView, $content);                 
              }
              $sourceView = $viewPath ."/menu.blade.php";
              if (File::exists($sourceView)){
                 $destView = "modules/$module/resources/views/menu.blade.php";
                 File::copy($sourceView, $destView);
                 $content = file_get_contents($destView);
                 $find = 'module';
                 $content = str_replace($find,$this->argument('name'),$content);
                 file_put_contents($destView, $content);     

                 $sourceView = $viewPath ."/list.blade.php"; 
                 $destView = "modules/$module/resources/views/list.blade.php";
                 File::copy($sourceView, $destView); 

                 $sourceView = $viewPath ."/edit.blade.php";
                 $destView = "modules/$module/resources/views/edit.blade.php";
                 File::copy($sourceView, $destView);

                 $sourceView = $viewPath ."/add.blade.php";   
                 $destView = "modules/$module/resources/views/add.blade.php";
                 File::copy($sourceView, $destView);      
                 $this->info("Create View policy success !!!");     
              }
              $viewSidebar = base_path("resources/views/parts/phoenix/sidebar.blade.php");
              if (File::exists($viewSidebar)) {
                 $content = file_get_contents($viewSidebar);
                 $find = "$module::class";
                 $position = strpos($content, $find);
                 if($position == false){
                    $find = '</ul>';                 
                    $newContent = "\t@can('view', Modules\\$module\\src\\Models\\$module::class)\n\t\t\t\t\t@include('$module::menu')\n\t\t\t\t@endcan";                   
                    $content = str_replace($find,$newContent."\n\t\t\t".$find,$content);
                    file_put_contents($viewSidebar, $content);
                 }
              }
         }
       
         

    }

  
}
