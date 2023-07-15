<?php

namespace modules\Posts\src\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Posts\src\Models\Posts;


class PostsController extends Controller
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
    public function index(Request $request)
    {
        //dd($request->user()->id);
        $title = "Danh sách bài viết";
        $active = 'posts';
        $uri = 'list';     
        $posts = Posts::where('user_id','=',$request->user()->id)->get();
        return view('Posts::posts',compact('title','active','uri','posts'));
        //return view('Posts::posts'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm bài viết";
        $active = 'posts.create';
        $uri = 'add';        
        return view('Posts::posts',compact('title','active','uri'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('Posts::posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Posts::posts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Sửa bài viết";
        $active = 'posts.edit';
        $uri = 'edit';        
        return view('Posts::posts',compact('title','active','uri'));
        //return view('Posts::posts');
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
        return view('Posts::posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        return view('Posts::posts');
    }
}
