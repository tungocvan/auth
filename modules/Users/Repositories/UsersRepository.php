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
    public function getAllUsers($limit = 5, $filters = [],$keyword='')
    {
        $users = $this->model->paginate($limit);
        //dd($users);
        if(!empty($filters)){
            //dd($filters);
            $users = $this->model->where($filters)->paginate($limit)->withQueryString();
        }        

        return $users;
    }
    public function getUserCurrent()
    {
        return Auth::user();
    }
   
}