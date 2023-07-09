<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $groupId= DB::table('groups')->insertGetId([
            'name' => 'Administrator', 
            'user_id' => 0,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ]);
       DB::statement('SET FOREIGN_KEY_CHECKS=1');

       if($groupId > 0) {
        $userId= DB::table('users')->insertGetId([
            'name' => 'Tu Ngoc Van',
            'email' => 'tungocvan@gmail.com',
            'password' => Hash::make('12345678'),
            'group_id' => $groupId,
            'user_id' => 0,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ]);
       }

       if($userId > 0) {
        for ($i=1; $i <=5 ; $i++) { 
            DB::table('posts')->insert([
                'title' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
                'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",         
                'user_id' => $userId,
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' =>date('Y-m-d H:i:s')
            ]);
        }
        
       }

       DB::table('modules')->insert([
        'name' => 'users',
        'title' => "Quản lý người dùng",                 
        'created_at' =>date('Y-m-d H:i:s'),
        'updated_at' =>date('Y-m-d H:i:s')
        ]);
       DB::table('modules')->insert([
        'name' => 'groups',
        'title' => "Quản lý nhóm",                 
        'created_at' =>date('Y-m-d H:i:s'),
        'updated_at' =>date('Y-m-d H:i:s')
        ]);
       DB::table('modules')->insert([
        'name' => 'posts',
        'title' => "Quản lý bài viết",                 
        'created_at' =>date('Y-m-d H:i:s'),
        'updated_at' =>date('Y-m-d H:i:s')
        ]);
    }
}
