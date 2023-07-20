<?php

namespace modules\Banhang\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Auth\src\Models\User;

class BanhangPolicy
{
    use HandlesAuthorization;

    public function view(User $user){
		$check = checkPermissions($user,"banhang","view");
		return $check;
	}
    public function create(User $user){
		$check = checkPermissions($user,"banhang","add");
		return $check;
	}
    public function edit(User $user){
		$check = checkPermissions($user,"banhang","edit");
		return $check;
	}
    public function delete(User $user){
		$check = checkPermissions($user,"banhang","delete");
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
