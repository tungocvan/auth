<?php

namespace App\Policies;

use Modules\Auth\src\Models\User;
use Modules\Posts\src\Models\Posts;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
 
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function viewAny(User $user)
    {
        //dd($user);
        $check = checkPermissions($user,'posts','view');        
        return $check;
    }
    public function createPost(User $user)
    {
        //dd($user);
        $check = checkPermissions($user,'posts','add');        
        return $check;
    }
    public function editPost(User $user)
    {
        //dd($user);
        $check = checkPermissions($user,'posts','edit');        
        return $check;
    }
    public function deletePost(User $user)
    {
        //dd($user);
        $check = checkPermissions($user,'posts','delete');        
        return $check;
    }
}
