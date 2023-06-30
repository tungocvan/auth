<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Command;
use File;
class CreateCompoment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:component {name} {--delete}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $nameComp = $this->argument('name'); 
        //$packageComp = $this->argument('package');
        $myoption = $this->option('delete');
        $compFile = base_path('app/View/Components/' . $nameComp . '.php');
        $servicePath = app_path('Providers/AppServiceProvider.php');                
        $str = preg_replace('/[^a-zA-Z0-9]+/', '-', $nameComp);
        $packageComp = strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', $str)); // thêm dấu gạch ngang vào phía trước các ký tự chữ hoa và chuyển chuỗi thành chữ thường
        $newContent = "use App\\View\\Components\\$nameComp;";
        $content = file_get_contents($servicePath);
        $find = strstr($content, $newContent , true);
        if($find !== false && $myoption == false) {
            dd('Component đã tồn tại');
        }
        
        if($myoption == false){
            Artisan::call('make:component', ['name' => $nameComp]);            
            $content = file_get_contents($servicePath);
            
            $content = str_replace('namespace App\Providers;',"namespace App\Providers;\n". $newContent, $content);
            file_put_contents($servicePath, $content);
            $content = file_get_contents($servicePath);
            $newContent="        Blade::component('$packageComp', $nameComp::class);";
            $content = str_replace('Schema::defaultStringLength(191);',"Schema::defaultStringLength(191);\n". $newContent, $content);
            file_put_contents($servicePath, $content);
        }else{
            if (File::exists($compFile)) {
                //dd($compFile);
                $content = file_get_contents($servicePath);
              
                $content = str_replace($newContent,'', $content);
                file_put_contents($servicePath, $content);
                $content = file_get_contents($servicePath);
                $newContent="Blade::component('$packageComp', $nameComp::class);";
                $content = str_replace($newContent,'', $content);
                file_put_contents($servicePath, $content);
                // xóa file
                File::delete($compFile);
                $viewComp=base_path('resources/views/components/' . $packageComp . '.blade.php');
                if (File::exists($viewComp)) {
                    File::delete($viewComp);
                }
            }
        }
        
        //dd($content);
        //$this->info("oki-$nameComp-$packageComp");
        return 0;
    }
}
