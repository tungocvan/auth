<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;
use Modules\Users\src\Models\UserMeta;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:test';

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
        // $name = ucfirst($this->argument('name'));
        // File::makeDirectory(base_path('modules/' . $name), 0755, true, true);
        // // tạo thư mục configs
        // $configFolder = base_path('modules/' . $name . '/configs');
        // if (!File::exists($configFolder)) {
        //     File::makeDirectory($configFolder, 0755, true, true);
        // }
        
        // $info = [
        //     'cccd' => '123456789',
        //     'phone' => '0903971949',
        //     'address' => '121A/48 Hậu Giang, P.05, Quận 06'
        // ];            
        // $userMeta = new UserMeta();
        // $userMeta->user_id = 1;
        // $userMeta->meta_key = 'info';
        // $userMeta->meta_value = serialize($info);
        // $userMeta->save();
        $info = UserMeta::where('meta_key','=','info')->get();
        $infoArray = unserialize($info[0]->meta_value);
        dd($infoArray);
        $this->info('thêm thành công: ');
    }
}
