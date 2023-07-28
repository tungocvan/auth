<?php

namespace modules\Users\src\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Users\src\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Users\src\Models\UserMeta;
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
        $getGroupname = [];
        if(count(getGroupAll()) > 0 ){
            foreach (getGroupAll() as $item) {
                array_push($getGroupname,[
                    'value' => $item->id,
                    'title' => $item->name
                ]);
            }
        }
        $title = "Thêm mới thành viên";
        $active = 'users.create';
        $uri = 'add';        
        $inputForm = [
            'action' => 'admin.users.store',       
             'value' => 'Cập nhật'             
        ];
        $inputName= ['type' => 'text','title' =>'Họ và tên', 'name' => 'name'];
        $inputEmail= ['type' => 'email','title' =>'Email address', 'name' => 'email'];
        $inputPassword= ['type' => 'password','title' =>'Mật khẩu', 'name' => 'password'];
        $inputPassword_confirmation= ['type' => 'password','title' =>'Nhập lại Mật khẩu', 'name' => 'password_confirmation'];
        $inputSelect = ['type' => 'select', 'name' => 'slWork','select' => $getGroupname, 'name' => "group"];
        return view('Users::users',compact('title','active','uri','inputForm','inputName','inputEmail','inputPassword','inputPassword_confirmation','inputSelect'));
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
        $getGroupname = [];
        if(count(getGroupAll()) > 0 ){
            foreach (getGroupAll() as $item) {
                array_push($getGroupname,[
                    'value' => $item->id,
                    'title' => $item->name
                ]);
            }
        }
        $title = "Sửathành viên";
        $active = 'users.edit';
        $uri = 'edit'; 
        
        $inputForm = [
            'action' => 'admin.users.update',       
             'value' => 'Cập nhật'             
        ] ?? '';
        $inputId= ['type' => 'text','name' => 'id', 'value' => $user->id, 'hidden' => true];        
        $inputName= ['type' => 'text','title' =>'Họ và tên', 'name' => 'name', 'value' => $user->name];        
        $inputEmail= ['type' => 'email','title' =>'Email address', 'name' => 'email', 'value' => $user->email];
        $inputPassword= ['type' => 'password','title' =>'Mật khẩu', 'name' => 'password', 'value' => $user->password];
        $inputPassword_confirmation= ['type' => 'password','title' =>'Nhập lại Mật khẩu', 'name' => 'password_confirmation', 'value' => $user->password];
        $inputSelect = ['type' => 'select', 'name' => 'slWork','select' => $getGroupname, 'name' => "group", 'value' => $user->group_id];
        // Form cập nhật thông tin
        $inputFormInfo = [
             'action' => 'admin.users.update-info',       
             'value' => 'Cập nhật'             
        ] ?? '';
        $inputCancuoc= ['type' => 'text','title' =>'Số căn cước', 'name' => 'cccd'];    
        $inputPhone= ['type' => 'text','title' =>'Số điện thoại', 'name' => 'phone'];    
        $inputAddress = ['type' => 'text','title' =>'Địa chỉ', 'name' => 'address'];    
        return view('Users::users',compact('title','active','uri','inputForm','inputId','inputName','inputEmail','inputPassword','inputPassword_confirmation','inputSelect','inputFormInfo','inputCancuoc','inputPhone','inputAddress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateInfo(Request $request){        
        $info = [
            'cccd' => $request->cccd,
            'phone' => $request->phone,
            'address' => $request->address
        ];        
        $userMeta = new UserMeta();
        $userMeta->user_id = $request->id;
        $userMeta->meta_key = 'info';
        $userMeta->meta_value = serialize($info);
        $userMeta->save();
        return redirect()->route('admin.users.index')->with('msg', "Cập nhật hồ thành công");
    }
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
