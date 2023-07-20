<?php

namespace Modules\Website\src\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Website\src\Models\Website;


class WebsiteController extends Controller
{
   public function __construct()
    {
       //$this->middleware("auth");
    }
    public function index(Request $request)
    {
        //dd($request->user()->group->name);
        $title = "Danh sách";
        $active = 'website';
        $uri = 'list';  
        return view('Website::website',compact('title','active','uri'));        
    }

    public function create()
    {
        $title = "Thêm";
        $active = 'website.create';
        $uri = 'add';        
        return view('Website::website',compact('title','active','uri'));
    }

   
    public function edit($id)
    {
        $title = "Sửa";
        $active = 'website.edit';
        $uri = 'edit';        
        return view('Website::website',compact('title','active','uri'));
    }

  
    public function update(Request $request, $id)
    {
        return view('Website::website');
    }

  
    public function destroy($id)
    { 
        return view('Website::website');
    }
}
