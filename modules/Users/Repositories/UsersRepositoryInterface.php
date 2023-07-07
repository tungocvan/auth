<?php
namespace modules\Users\Repositories;
use App\Repositories\RepositoryInterface;
interface UsersRepositoryInterface extends RepositoryInterface
{    
       public function getAllUsers($limit);       
       public function getUserCurrent();       
}