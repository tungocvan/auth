<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:module {name}';

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
        $name = ucfirst($this->argument('name'));
        File::makeDirectory(base_path('modules/' . $name), 0755, true, true);
        // tạo thư mục configs
        $configFolder = base_path('modules/' . $name . '/configs');
        if (!File::exists($configFolder)) {
            File::makeDirectory($configFolder, 0755, true, true);
        }
        $this->info('Module tạo thành công');
    }
}
