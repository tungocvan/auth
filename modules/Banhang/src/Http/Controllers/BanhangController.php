<?php

namespace Modules\Banhang\src\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Banhang\src\Models\Banhang;


class BanhangController extends Controller
{
   public function __construct()
    {
       //$this->middleware("auth");
    }
    public function index(Request $request)
    {
        //dd($request->user()->group->name);
        $title = "Danh sách";
        $active = 'banhang';
        $uri = 'list';  
        return view('Banhang::banhang',compact('title','active','uri'));        
    }

    public function create()
    {
        $title = "Thêm";
        $active = 'banhang.create';
        $uri = 'add';        
        return view('Banhang::banhang',compact('title','active','uri'));
    }

   
    public function edit($id)
    {
        $title = "Sửa";
        $active = 'banhang.edit';
        $uri = 'edit';        
        return view('Banhang::banhang',compact('title','active','uri'));
    }

  
    public function update(Request $request, $id)
    {
        return view('Banhang::banhang');
    }

  
    public function destroy($id)
    { 
        return view('Banhang::banhang');
    }
}
