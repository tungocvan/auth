<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Auth\src\Models\User;

class GroupPolicy
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
        $check = checkPermissions($user,'groups','view');        
        return $check;
    }
    public function create(User $user)
    {
        //dd($user);
        $check = checkPermissions($user,'groups','add');        
        return $check;
    }
    public function edit(User $user)
    {
        //dd($user);
        $check = checkPermissions($user,'groups','edit');        
        return $check;
    }
    public function delete(User $user)
    {
        //dd($user);
        $check = checkPermissions($user,'groups','delete');        
        return $check;
    }
    public function permission(User $user)
    {
        //dd($user);
        $check = checkPermissions($user,'groups','permission');        
        return $check;
    }
}
