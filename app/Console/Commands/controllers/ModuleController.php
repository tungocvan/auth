<?php

namespace Modules\moduleName\src\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\moduleName\src\Models\moduleName;


class moduleNameController extends Controller
{
   public function __construct()
    {
       //$this->middleware("auth");
    }
    public function index(Request $request)
    {
        //dd($request->user()->group->name);
        $title = "Danh sách";
        $active = 'moduleRoute';
        $uri = 'list';  
        return view('moduleName::moduleRoute',compact('title','active','uri'));        
    }

    public function create()
    {
        $title = "Thêm";
        $active = 'moduleRoute.create';
        $uri = 'add';        
        return view('moduleName::moduleRoute',compact('title','active','uri'));
    }

   
    public function edit($id)
    {
        $title = "Sửa";
        $active = 'moduleRoute.edit';
        $uri = 'edit';        
        return view('moduleName::moduleRoute',compact('title','active','uri'));
    }

  
    public function update(Request $request, $id)
    {
        return view('moduleName::moduleRoute');
    }

  
    public function destroy($id)
    { 
        return view('moduleName::moduleRoute');
    }
}
