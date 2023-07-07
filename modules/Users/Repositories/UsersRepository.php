<?php
namespace modules\Users\Repositories;
use Modules\Auth\src\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Modules\Users\Repositories\UsersRepositoryInterface;

class UsersRepository extends BaseRepository implements UsersRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return User::class;
    }
    public function getAllUsers($limit=10)
    {
        return $this->model->paginate($limit);
    }
    public function getUserCurrent()
    {
        return Auth::user();
    }
   
}