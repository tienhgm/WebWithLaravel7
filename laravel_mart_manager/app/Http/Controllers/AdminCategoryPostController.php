<?php

namespace App\Http\Controllers;

use App\CategoryPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminCategoryPostController extends Controller
{
    //
    function __construct()
    {
        // phai khai bao middle thi moi dung duoc session o trong ham khoi tao __construct
        $this->middleware(function($request,$next){
            session(['module_active'=>'category_post']);
            return $next($request);
        });
    }
    function list(){
        $categoriesPost = CategoryPost::paginate(5);

        return view('admin.categorypost.list',compact('categoriesPost'));
    }

    function add(){
        return view('admin.categorypost.add');
    }

    function store(Request $request){

        $request->validate(
            [
                'name' => 'required|string|max:100',
            ],
            [
                'required'=> ':attribute không được để trống'
            ],
            [
                'name' => 'Tên danh mục'
            ]
        );
        CategoryPost::create(
            [
                'name' => $request->input('name')
            ]
        );
        return redirect('admin/post/category/list')->with('status','Đã thêm mới thành công');
       
    }
    function edit($id){
        $cate_post = CategoryPost::find($id);
        return view('admin.categorypost.edit',compact('cate_post'));
    }
    function update(Request $request, $id){
        $request->validate(
            [
                'name' => 'required',
            ],
            [
                'required'=> ':attribute không được để trống'
            ],
            [
                'name' => 'Tên danh mục'
            ]
        );
        CategoryPost::where('id',$id)->update(
            [
                'name' => $request->input('name')
            ]
        );
        return redirect('admin/post/category/list')->with('status','Đã cập nhật thành công');

    }

    function delete($id){
        $cate_post = CategoryPost::find($id);
        $cate_post->delete();
        return redirect('admin/post/category/list')->with('status','Đã xoá thành công');
    }
}
