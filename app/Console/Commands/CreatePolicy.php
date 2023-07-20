<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
class CreatePolicy extends Command
{
    protected $signature = 'create:policy {name}';

    protected $description = 'Create a new policy and move it to the specified directory';

    public function handle()
    {
        $module = $this->argument('name');
        $name = ucfirst($module).'Policy';
        $nameModule = ucfirst($this->argument('name'));
        $path = "modules/{$nameModule}/Policies";
        //dd($path);
        if (!is_dir(realpath($path))) {
            // đường dẫn không tồn tại hoặc không phải là một thư mục
            // xử lý lỗi tại đây
            // ví dụ: throw new Exception("Đường dẫn không tồn tại");
            File::makeDirectory($path , 0755, true, true);
            // $this->info("Polyci đã tồn tại: {$path}");
        } 
        $this->call('make:policy', [
            'name' => $name,
        ]);

        // Di chuyển Policy đến thư module
        $this->movePolicy($name, $path,$module);
        

        //$modulename = explode('/', $path);
        //dd($modulename);
        // Tạo model
    }

    private function movePolicy($name, $path,$module)
    {
        $policyPath = app_path("Policies/{$name}.php");
        $newPath = base_path($path) . "/{$name}.php";
        //$this->info($policyPath);
        //$this->info($newPath);
        // Di chuyển model
        rename($policyPath, $newPath);

        // // Đọc nội dung file model
        $content = file_get_contents($newPath);
        // Thay đổi namespace của model bằng đường dẫn mới
        $newNamespace = str_replace('/', '\\', $path);
        $content = str_replace('namespace App\Policies;', "namespace {$newNamespace};", $content);
        file_put_contents($newPath, $content);
        $content = file_get_contents($newPath);
        $find = 'use HandlesAuthorization;';
        $view = $find."\n\n".'    public function view(User $user){'."\n\t\t".'$check = checkPermissions($user,"'.$module.'","view");'."\n\t\t".'return $check;'."\n\t".'}'."\n";
        $view .= '    public function create(User $user){'."\n\t\t".'$check = checkPermissions($user,"'.$module.'","add");'."\n\t\t".'return $check;'."\n\t".'}'."\n";
        $view .= '    public function edit(User $user){'."\n\t\t".'$check = checkPermissions($user,"'.$module.'","edit");'."\n\t\t".'return $check;'."\n\t".'}'."\n";
        $view .= '    public function delete(User $user){'."\n\t\t".'$check = checkPermissions($user,"'.$module.'","delete");'."\n\t\t".'return $check;'."\n\t".'}'."\n";
        $content = str_replace($find,$view,$content);
        file_put_contents($newPath, $content);

        $providerPath = app_path("Providers/AuthServiceProvider.php");

        if (File::exists($providerPath)){
            $content = file_get_contents($providerPath);
            $find = 'namespace App\Providers;';
            $module = ucfirst($module);
            $policy = "use Modules\\$module\\Policies\\$name;";
            $position = strpos($content, $policy); // hàm tìm kiếm chuỗi con 
            if($position == false){
                $model = "use Modules\\$module\\src\\Models\\$module;";
                $newContent = $find."\n\n".$model."\n".$policy."\n";
                $content = str_replace($find,$newContent,$content);
                file_put_contents($providerPath, $content);

                $content = file_get_contents($providerPath);
                $find = 'protected $policies = [';
                $newContent = $find."\n"."\t\t$module::class => $name::class,";
                $content = str_replace($find,$newContent,$content);
                file_put_contents($providerPath, $content);
            } 
            
        }

        $this->info("Policy {$name} created and moved to {$newPath}");
    }
}
