<?php

namespace modules\Website\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Auth\src\Models\User;

class WebsitePolicy
{
    use HandlesAuthorization;

    public function view(User $user){
      
		$check = checkPermissions($user,"website","view");
    
		return $check;

	}
    public function create(User $user){
		$check = checkPermissions($user,"website","add");
		return $check;
	}
    public function edit(User $user){
		$check = checkPermissions($user,"website","edit");
		return $check;
	}
    public function delete(User $user){
		$check = checkPermissions($user,"website","delete");
		return $check;
	}


    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
