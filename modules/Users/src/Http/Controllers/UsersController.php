<?php

namespace modules\Users\src\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Users\src\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
        if($request->deleteAll =='submit'){            
            $this->deleteAll($request->chkUsers);
        }
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

        $users = $this->usersRepo->getAllUsers($limit,$filters,$keyword,$sortBy,$sortType);
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
        $active = 'users.create';
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
        
        $request->validate(
            [
                'name' => 'required|min:2',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',                
            ],
            [
                'name.min' => 'username ít nhất :min ký tự',
                'name.required' => 'username buộc phải nhập',
                'email.required' => 'email buộc phải nhập',
                'email.email' => 'Email không hợp lệ',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Mật khẩu bắt buộc phải nhập',
                'password.min' => 'Mật khẩu ít nhất :min ký tự',         
            ]
        );
        
        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'group_id' => $request->group,
            'user_id' => $this->usersRepo->getUserCurrent()->id, 
        ];
        //dd($user);
        $this->usersRepo->create($user);
        return back()->with('msg','Cập nhật thành công');
        //return view('Users::users');
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
        //dd($user);
        $title = "Sửathành viên";
        $active = 'users.edit';
        $uri = 'edit'; 
        
        return view('Users::users',compact('title','active','uri','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:2',
                'email' => 'required|email',
                'password' => 'required|min:6|confirmed',                
            ],
            [
                'name.min' => 'username ít nhất :min ký tự',
                'name.required' => 'username buộc phải nhập',
                'email.required' => 'email buộc phải nhập',
                'email.email' => 'Email không hợp lệ',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Mật khẩu bắt buộc phải nhập',
                'password.min' => 'Mật khẩu ít nhất :min ký tự',         
            ]
        );
        
        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'group_id' => $request->group,
            'user_id' => $this->usersRepo->getUserCurrent()->id, 
        ];
        $id = $request->id;
        $this->usersRepo->update($id,$user);
        //return back()->with('msg','Cập nhật thành công');
        return redirect()->route('admin.users.index')->with('msg', "Cập nhật thành công $request->email");
        //dd($request);
        //return view('Users::users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->usersRepo->delete($id);
        return back()->with('msg','Xóa thành công');
    }
    public function deleteAll($users)
    {
        foreach($users as $userId){
            $this->usersRepo->delete($userId);
        }    
        return back()->with('msg','Xóa thành công');
    }
}
