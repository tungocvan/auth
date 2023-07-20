<?php

namespace modules\Groups\src\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Auth\src\Models\User;
use App\Http\Controllers\Controller;
use Modules\Groups\src\Models\Groups;
use Modules\Modules\src\Models\Modules;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       //$this->middleware("auth");
    }
    public function index()
    {
        
        $title = "Danh sách nhóm";
        $active = 'groups';
        $uri = 'list';  
        $groups = Groups::all();
        return view('Groups::groups',compact('title','active','uri','groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm nhóm mới";
        $active = 'groups.create';
        $uri = 'add';        
        return view('Groups::groups',compact('title','active','uri'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('Groups::groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Groups::groups');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Sửa nhóm mới";
        $active = 'groups.edit';
        $uri = 'edit';        
        return view('Groups::groups',compact('title','active','uri'));
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
        return view('Groups::groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('Groups::groups');
    }

    public function permission(Groups $group)
    {
       
        $title = "Phân quyền nhóm";
        $active = 'groups.permission';
        $uri = 'permission';          
        $modules = Modules::all();
        //dd($modules);
        $roleListArr = [
            "view" => "Xem",
            "add" => "Thêm",
            "edit" => "Sửa",
            "delete" => "Xóa"
        ];
        $roleJson = $group->permissions;
        if(!empty($roleJson)){
            $roleArr= json_decode($roleJson,true);
        }else{
            $roleArr= [];
        }
        return view('Groups::groups',compact('title','active','uri','group','modules','roleListArr','roleArr'));
    }
    public function postPermission(Groups $group, Request $request)
    {
       
        if(!empty($request->role)){
            $roleArr = $request->role;
        }else{
            $roleArr = [];
        }
        $roleJson = json_encode($roleArr);        
        $group->permissions =  $roleJson ;
        $group->save();
        return back()->with('msg','Phân quyền thành công !');
        
    }
}
   

