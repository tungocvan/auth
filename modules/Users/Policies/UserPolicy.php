<?php

namespace Modules\Users\Policies; 

use Modules\Auth\src\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Modules\Auth\src\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        $check = checkPermissions($user,'users','view'); 
        return $check;
    }

    public function create(User $user)
    {
        //dd($user);
        $check = checkPermissions($user,'users','add');        
        return $check;
    }
    public function edit(User $user)
    {
        //dd($user);
        $check = checkPermissions($user,'users','edit');        
        return $check;
    }
    public function delete(User $user)
    {
        //dd($user);
        $check = checkPermissions($user,'users','delete');                    
        return $check;
    }
    
}
