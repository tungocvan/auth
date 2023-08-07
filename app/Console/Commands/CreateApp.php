<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use Illuminate\Support\Facades\Artisan;
class CreateApp extends Command
{
    protected $signature = 'create:app {name}';
    protected $description = 'Create a new App for policy';
    public function handle()
    {
         $name = $this->argument('name'); 
         Artisan::call('make:module', [
            'name' => $name,
         ]);
         Artisan::call('create:policy', [
            'name' => $name,
         ]);
         Artisan::call('create:route', [
            'name' => $name,
         ]);
         Artisan::call('create:conPolicy', [
            'name' => $name,
         ]);
         Artisan::call('create:view', [
            'name' => $name,
         ]);

    }

  
}
