<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\CategoryProduct;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\File;
class AdminProductController extends Controller
{
    //
    function __construct()
    {   
        // phai khai bao middle thi moi dung duoc session o trong ham khoi tao __construct
        $this->middleware(function($request,$next){
            session(['module_active'=>'product']);
            return $next($request);
        });
    }
    function list(Request $request){

        $status = $request->input('status');

        $list_act = [
            'delete' => 'Xóa'
        ];


        if($status == 'trash'){

            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
            $products = Product::onlyTrashed()->orderBy('id','desc')->paginate(8);
        }else if($status == 'public'){

            $products = Product::where('status',1)->orderBy('id','desc')->paginate(8);
        }else if($status == 'process'){

            $products = Product::where('status',0)->orderBy('id','desc')->paginate(8);
        }else {

            $products = Product::orderBy('id','desc')->paginate(8);
        }

        $count_product_process = Product::where('status',0)->count();
        $count_product_success = Product::where('status',1)->count();
        $count_product_unset = Product::onlyTrashed()->count();

        $count = [$count_product_process,$count_product_success, $count_product_unset];

        return view('admin.product.list',compact('products','count','list_act'));
    }
    
    function add(){
        $categories = DB::table('category_product')->orderBy('id','desc')->get();
        return view('admin.product.add',compact('categories'));
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'description'=>'required|string|max:255',
                'content'=>'required',
                'price' => 'required',
                'quantity'=>'required'

            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài ít nhất :min ký tự',
                'max' => ':attribute có độ dài tối đa :max ký tự',

            ],
            [
                'name' => 'Tên sản phẩm',
                'description'=>'Miêu tả sản phẩm',
                'content' => 'Chi tiết sản phẩm',
                'price' => 'Giá sản phẩm',
                'quantity'=> 'Số lượng'
            ]
        );
        $product = new Product();

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->cate_product_id = $request->input('cate');
        $product->status = $request->input('status');

        if($request->hasFile('file')){

            $file = $request->file;
            $nameFile = time(). '.' .$file->getClientOriginalExtension();
            $file->move('public/uploads/product/',$nameFile);
            $product->photo = $nameFile;
        }else{
            $product->photo ='';
        }
        $product->save();
        return redirect('admin/product/list')->with('status','Đã thêm sản phẩm thành công');
    }

    function set_status($id){

        Product::where('id',$id)
        ->update(
            [
                'status'=> 1
            ]
        );
        return redirect('admin/product/list');
    }

    function edit($id){
        $categories = DB::table('category_product')->orderBy('id','desc')->get();
        $product = Product::find($id);
        return view('admin.product.edit',compact('categories','product'));
    }
    function update(Request $request, $id){

        $request->validate(
            [
                'name' => 'required|string|max:255',
                'description'=>'required|string|max:255',
                'content'=>'required',
                'price' => 'required',
                'quantity'=>'required'

            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài ít nhất :min ký tự',
                'max' => ':attribute có độ dài tối đa :max ký tự',

            ],
            [
                'name' => 'Tên sản phẩm',
                'description'=>'Miêu tả sản phẩm',
                'content' => 'Chi tiết sản phẩm',
                'price' => 'Giá sản phẩm',
                'quantity'=> 'Số lượng'
            ]
        );
        $product = Product::find($id);
        
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->cate_product_id = $request->input('cate');
        $product->status = $request->input('status');

        $nameFile = $product->photo;
        $file_path = public_path('uploads/product/'.$nameFile);
        if($request->hasFile('file')){

            if(file_exists($file_path)){
                FILE::delete($file_path);
            }
            $file = $request->file;
            $nameFile = time(). '.' .$file->getClientOriginalExtension();
            $file->move('public/uploads/product/',$nameFile);
            $product->photo = $nameFile;
        }
        $product->save();
        return redirect('admin/product/list')->with('status','Đã cập nhật sản phẩm thành công');
    }

    function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        $file_path = public_path('uploads/product/'.$product->photo);
        if(file_exists($file_path)){
            FILE::delete($file_path);
        }
        return redirect('admin/product/list')->with('status','Đã xóa sản phẩm thành công');
    }

    function action(Request $request)
    {
        $list_check = $request->input('list_check');
        if($list_check){
            
            if(!empty($list_check)){
                $act = $request->input('act');
                if( $act == 'delete'){
                    Product::destroy($list_check);
                    return redirect('admin/product/list')->with('status','Đã xóa thành công');
                }
                if( $act == 'restore'){
                    Product::withTrashed()->whereIn('id',$list_check)
                    ->restore();
                    return redirect('admin/product/list')->with('status','Đã khôi phục thành công');
                }
                if($act == 'forceDelete'){
                    Product::withTrashed()
                    ->whereIn('id',$list_check)
                    ->forceDelete();
                    return redirect('admin/product/list')->with('status','Bạn đã xóa vĩnh viễn sản phẩm thành công');
                }
            }
        }else{
            return redirect('admin/product/list')->with('status','Cần chọn phần tử để thực hiện');
        }
    }
    
}
