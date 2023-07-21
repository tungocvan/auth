<?php

namespace modules\Dashboard\src\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Dashboard\src\Models\Dashboard;

class DashboardController extends Controller
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
        //dd(assetPath('css'));
        $title = "Trang chủ";
        $active = 'dashboard';
        $uri = 'list';
        $inputUsername = ['type' => 'text','title' =>'Họ và tên', 'name' => 'username'];
        $inputEmail = ['type' => 'email','title' =>'Địa chỉ email', 'name' => 'email'];
        $inputDate = ['type' => 'date', 'name' => 'startDay'];
        $inputSelect = ['type' => 'select', 'name' => 'slWork','select' => [['value' => '1','title' => 'Honda'],['value' => '12','title' => 'Toyota'],],'multiple' => false];
        $inputFile = ['type' => 'file', 'name' => 'fileAnh'];
        return view('Dashboard::dashboard',compact('title','active','uri','inputUsername','inputEmail','inputDate','inputSelect','inputFile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard::dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('Dashboard::dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Dashboard::dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Dashboard::dashboard');
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
        return view('Dashboard::dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('Dashboard::dashboard');
    }
}
