<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryProduct;
class AdminCategoryProductController extends Controller
{
    //
    function __construct()
    {
        // phai khai bao middle thi moi dung duoc session o trong ham khoi tao __construct
        $this->middleware(function($request,$next){
            session(['module_active'=>'category_product']);
            return $next($request);
        });
    }
    function list(){
        $categoriesProduct = CategoryProduct::paginate(5);

        return view('admin.categoryproduct.list',compact('categoriesProduct'));
    }
    function add(){
        return view('admin.categoryproduct.add');
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
        CategoryProduct::create(
            [
                'name' => $request->input('name')
            ]
        );
        return redirect('admin/product/category/list')->with('status','Đã thêm mới thành công');
       
    }
    function edit($id){
        $cate_product = CategoryProduct::find($id);
        return view('admin.categoryproduct.edit',compact('cate_product'));
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
        CategoryProduct::where('id',$id)->update(
            [
                'name' => $request->input('name')
            ]
        );
        return redirect('admin/product/category/list')->with('status','Đã cập nhật thành công');

    }

    function delete($id){
        $cate_product = CategoryProduct::find($id);
        $cate_product->delete();
        return redirect('admin/product/category/list')->with('status','Đã xoá thành công');
    }
}
