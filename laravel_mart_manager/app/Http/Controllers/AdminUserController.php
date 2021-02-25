<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class AdminUserController extends Controller
{
    //
    function __construct()
    {   
        // phai khai bao middle thi moi dung duoc session o trong ham khoi tao __construct
        $this->middleware(function($request,$next){
            session(['module_active'=>'user']);
            return $next($request);
        });
    }

    function list(Request $request){
        
        $status = $request->input('status');
        $list_act = [
            'delete' => 'Xóa tạm thời',
        ];

        if($status =='trash'){
            $users = User::onlyTrashed()->paginate(5);
            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn',
                
            ];
        }else{

            $keyword ="";
            if($request->input('keyword')){
                $keyword = $request->input('keyword');
    
            }
            $users = User::where('name','LIKE',"%{$keyword}%")->paginate(5); 
        }
        $count_user_active = User::count();
        $count_user_trash = User::onlyTrashed()->count();
        
        $count = [$count_user_active, $count_user_trash];
        // return $users;
        
        return view('admin.user.list',compact('users','count','list_act'));
    }

    function add(){
       
        return view('admin.user.add');
    }

    function store(Request $request){
        // return $request->input();

        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' =>'required|string|min:8|confirmed',
                'phone' => 'required|max:10',
                'address' => 'required'
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài ít nhất :min ký tự',
                'max' => ':attribute có độ dài tối đa :max ký tự',
                'confirmed' => 'Xác nhận mật khẩu thành công',
            ],
            [
                'name' => 'Tên người dùng',
                'email'=> 'Email người dùng',
                'password'=> 'Mật khẩu',
                'phone' => 'Số điện thoại',
                'address' => 'Địa chỉ'
            ]
        );
        User::create(
            [
            'name'=> $request->input('name'),
            'email'=>$request->input('email'),
            'password'=> Hash::make($request->input('password')),
            'phone'=>$request->input('phone'),
            'address' => $request->input('address'),
            'role_id' =>$request->input('role')
            ]
        );

        return redirect('admin/user/list')->with('status','Đã thêm mới thành công');
    }

    function edit($id){
        $user = User::find($id);

        return view('admin.user.edit',compact('user'));
    }
    function update(Request $request, $id){
        
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'password' =>'required|string|min:8|confirmed',
                'phone' => 'required|max:10',
                'address' => 'required'
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài ít nhất :min ký tự',
                'max' => ':attribute có độ dài tối đa :max ký tự',
                'confirmed' => 'Xác nhận mật khẩu thành công',
            ],
            [
                'name' => 'Tên người dùng',
                'password'=> 'Mật khẩu',
                'phone' => 'Số điện thoại',
                'address' => 'Địa chỉ'
            ]
        );
        User::where('id',$id)->update(
            [
            'name'=> $request->input('name'),
            'password'=> Hash::make($request->input('password')),
            'phone'=>$request->input('phone'),
            'address' => $request->input('address'),
            'role_id' =>$request->input('role')            
            ]
        );

        return redirect('admin/user/list')->with('status','Đã cập nhật thành công');
    }

    function delete($id){
        if(Auth::id() != $id){
            $user = User::find($id);
            $user->delete();
            return redirect('admin/user/list')->with('status','Đã xóa thành viên thành công');
        }else{
            return redirect('admin/user/list')->with('status','Bạn không thể tự xóa mình khỏi hệ thống');
        }
    }

    function action(Request $request){

        $list_check = $request->input('list_check');
        if($list_check){
            //xoa id trung voi id dang nhap hien tai
            foreach($list_check as $k=>$id){
                if(Auth::id() == $id) 
                    unset($list_check[$k]);
            }
            if(!empty($list_check)){
                $act = $request->input('act');
                if($act == 'delete'){
                    User::destroy($list_check);
                    return redirect('admin/user/list')->with('status','Bạn đã xóa thành công');
                }
                if($act == 'restore'){
                    User::withTrashed()
                    ->whereIn('id',$list_check)
                    ->restore();
                    return redirect('admin/user/list')->with('status','Bạn đã khôi phục thành công');
                }
                if($act == 'forceDelete'){
                    User::withTrashed()
                    ->whereIn('id',$list_check)
                    ->forceDelete();
                    return redirect('admin/user/list')->with('status','Bạn đã xóa vĩnh viễn user thành công');
                }
            }
            return redirect('admin/user/list')->with('status','Bạn không thể thao tác trên tài khoản của bạn');
            
        }else{
            return redirect('admin/user/list')->with('status','Bạn cần chọn phần tử để thực hiện');
        }
    }
}
