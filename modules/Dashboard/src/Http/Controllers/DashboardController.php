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
        $inputSelect = ['type' => 'select', 'name' => 'slWork','select' => [['value' => '1','title' => 'Honda'],['value' => '12','title' => 'Toyota'],],'multiple' => true];
        $inputFile = ['type' => 'file', 'name' => 'fileAnh'];
        $inputChoices = ['type' => 'choices', 'name' => 'choices','select' => [['value' => 'Honda','label' => 'Honda'],['value' => 'Toyota','label' => 'Toyota']]];
        
        $menuItems = array(
            array(
                'name' => 'Home',
                'url' => 'index.php',
                'id' => 1,
                'parent' => null
            ),
            array(
                'name' => 'About',
                'url' => 'about.php',
                'id' => 2,
                'parent' => null
            ),
            array(
                'name' => 'Products',
                'url' => 'products.php',
                'id' => 3,
                'parent' => null
            ),
            array(
                'name' => 'Contact Us',
                'url' => 'contact.php',
                'id' => 4,
                'parent' => null
            ),
            array(
                'name' => 'Category 1',
                'url' => 'category1.php',
                'id' => 5,
                'parent' => 3
            ),
            array(
                'name' => 'Category 2',
                'url' => 'category2.php',
                'id' => 6,
                'parent' => 3
            ),
            array(
                'name' => 'Subcategory 1',
                'url' => 'subcategory1.php',
                'id' => 7,
                'parent' => 5
            ),
            array(
                'name' => 'Subcategory 2',
                'url' => 'subcategory2.php',
                'id' => 8,
                'parent' => 5
            ),
            array(
                'name' => 'Category 1',
                'url' => 'category1.php',
                'id' => 9,
                'parent' => 2
            ),
            array(
                'name' => 'Category 2',
                'url' => 'category2.php',
                'id' => 10,
                'parent' => 2
            ),
        );

        $inputForm = [
            'action' => 'admin.dashboard.submit',                    
        ];
        
        return view('Dashboard::dashboard',compact('title','active','uri','inputUsername','inputEmail','inputDate','inputSelect','inputFile','menuItems','inputChoices','inputForm'));
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

    public function submit(Request  $request)
    {
        dd($request);
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
