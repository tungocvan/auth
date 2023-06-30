<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class auth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:auth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy file auth';

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
        //$fileAuth = "modules/Auth/src/Http/Controllers/AuthRouteMethods.php";
        // if (File::exists($fileAuth)) {             
        //      $fileAuthNew = "vendor/laravel/ui/src"; 
        //      if (File::exists($fileAuthNew)) {
        //         $fileAuthNew = "vendor/laravel/ui/src/AuthRouteMethods.php";
        //         File::copy($fileAuth, $fileAuthNew);
        //         $this->info('Copy file AuthRouteMethods.php success !!!');
        //      }
        //     return;
        // }
        // $fileAuth = "vendor/laravel/ui/src/AuthRouteMethods.php";
        // if (File::exists($fileAuth)) { 
        //     $this->info('Copy file AuthRouteMethods.php success !!!');
        //     return;
        // }
        // $this->error('Copy file AuthRouteMethods.php fail !!!');
        // return 0;
    }
}
