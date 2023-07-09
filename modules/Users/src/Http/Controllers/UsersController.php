<?php

namespace modules\Users\src\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Users\src\Models\Users;
use App\Http\Controllers\Controller;
use Modules\Users\Repositories\UsersRepositoryInterface;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $usersRepo;
    public function __construct(UsersRepositoryInterface $usersRepo)
    {
       $this->middleware("auth");
       $this->usersRepo = $usersRepo;
    }
    public function index(Request $request)
    {
        $title = "Danh sách thành viên";
        $active = 'users';
        $uri = 'list';       
        $filters = [];
        $limit = 5;
        $status = $request->input('status') ?? -1;
        $groupId = $request->input('group') ?? -1;
        $keyword = $request->input('keyword') ?? '';                
        if($status != -1){
            $filters[] = [
                'users.status','=',$status
            ];
        }
        if($groupId != -1){
            $filters[] = [
                'users.group_id','=',$groupId
            ];
        }
        if(!empty($keyword)){
            $filters[] = [
                'users.name', 'like', '%'.$keyword.'%'
            ];            
        }
        //dd(getGroupAll());
        //$users = $this->usersRepo->getAll();
         $users = $this->usersRepo->getAllUsers($limit,$filters,$keyword);
         //dd($users); //currentPage , total, path
        //$users = $this->usersRepo->getUserCurrent();
        //dd($users);
        
        $sortBy = $request->input('sortBy');       
        $sortType = $request->input('sortType') ?? "asc";  
        if( $sortType == "asc") {
            $sortIcon = "fas fa-angle-up";
            $sortType = "desc";
        }else{
            $sortIcon = "fas fa-angle-down";
            $sortType = "asc";
        }
        
        return view('Users::users',compact('title','active','uri','users','sortIcon','sortType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm mới thành viên";
        $active = 'create';
        $uri = 'add';        
        return view('Users::users',compact('title','active','uri'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('Users::users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Users::users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $user)
    {
        dd($user);
        return view('Users::users');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('Users::users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo $id;
        return view('Users::users');
    }
}
