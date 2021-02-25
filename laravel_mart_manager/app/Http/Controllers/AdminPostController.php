<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use App\CategoryPost;
use Illuminate\Support\Facades\File;
class AdminPostController extends Controller
{
    //
    function __construct()
    {   
        // phai khai bao middle thi moi dung duoc session o trong ham khoi tao __construct
        $this->middleware(function($request,$next){
            session(['module_active'=>'post']);
            return $next($request);
        });
    }
    function list(){
        $posts = Post::orderBy('id','desc')->paginate(5);
        return view('admin.post.list',compact('posts'));
    }
    function add(){ 
        $categories = DB::table('category_post')->orderBy('id','desc')->get();
        return view('admin.post.add',compact('categories'));
    }
    function store(Request $request){

       
        $request->validate(

            [
                'title'=>'required|string|max:100',
                'content'=>'required',  
                
            ],
            [
                'required'=>'Trường :attribute không được để trống'
            ],
            [
                'title' => 'Tiêu đề',
                'content'=> 'Nội dung'
            ]
        );
        $post = new Post();
        
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->cate_id = $request->input('cate');
        $post->status = $request->input('exampleRadios');


        
        if($request->hasFile('file')){

            $file = $request->file;
            $nameFile = time(). '.' .$file->getClientOriginalExtension();
            $file->move('public/uploads/post/',$nameFile);
            $post->thumbnail = $nameFile;
        }else{
            $post->thumbnail ='';
        }
        $post->save();

        // if($get_image){
        //     $new_image = rand(111,999).'.'.$get_image->getClientOriginalExtension();
        //     $get_image->move('public/uploads/post',$new_image);
            
        //     Post::create(
        //         [   
        //             'title' => $request->input('title'),
        //             'content'=>$request->input('content'),
        //             'cate_id'=> $request->input('cate'),
        //             'thumbnail'=>$request->input('file',$new_image),
        //             'status'=>$request->input('exampleRadios')      
        //         ]
        //     );
        // }
        
        return redirect('admin/post/list')->with('status','Đã thêm thành công bài viết');
    }
    function set_status($id){

        $post = Post::where('id',$id)
        ->update(
            [
                'status'=> 1
            ]
        );
        return redirect('admin/post/list');
        // cach 2 
        // $post = Post::find($id);
        // $post->status = 1;
        // $post->save();

    }
    function edit($id)
    {
        $categories = DB::table('category_post')->orderBy('id','desc')->get();
        $post = Post::find($id);
        return view('admin.post.edit',compact('post','categories'));
    }

    function update(Request $request, $id)
    {
        $request->validate(

            [
                'title'=>'required|string|max:100',
                'content'=>'required',  
                
            ],
            [
                'required'=>'Trường :attribute không được để trống'
            ],
            [
                'title' => 'Tiêu đề',
                'content'=> 'Nội dung'
            ]
        );

        $post = Post::find($id);
        
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->cate_id = $request->input('cate');
        $post->status = $request->input('exampleRadios');

        $nameFile = $post->thumbnail;
        $file_path = public_path('uploads/post/'.$nameFile);
        if($request->hasFile('file')){
            
            if(file_exists($file_path)){
                FILE::delete($file_path);
            }
            $file = $request->file;
            $nameFile = time(). '.' .$file->getClientOriginalExtension();
            $file->move('public/uploads/post',$nameFile);
            $post->thumbnail = $nameFile;
        }
        $post->save();
        
        return redirect('admin/post/list')->with('status','Đã cập nhật thành công bài viết');
    }
    
    function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        $file_path = public_path('uploads/post/'.$post->thumbnail);
        if(file_exists($file_path)){
            FILE::delete($file_path);
        }
        return redirect('admin/post/list')->with('status','Đã xóa bài viết thành công');
    }
}
