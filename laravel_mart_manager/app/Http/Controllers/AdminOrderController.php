<?php

namespace App\Http\Controllers;

use App\OrderDetails;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class AdminOrderController extends Controller

{
    //
    function __construct()
    {   
        // phai khai bao middle thi moi dung duoc session o trong ham khoi tao __construct
        $this->middleware(function($request,$next){
            session(['module_active'=>'order']);
            return $next($request);
        });
    }
    function list(Request $request){

        // $all_orders = DB::table('orders')
        // ->join('users','orders.user_id','=','users.id')
        // ->select('orders.*','users.name','users.phone','users.address')
        // ->orderBy('orders.id','desc')
        // ->paginate(10);

        $status = $request->input('status');

        $list_act = [
            'delete' => 'Xóa đơn'
        ];

        if($status == 'trash')
        {
            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
            $all_orders = Orders::onlyTrashed()->paginate(10);
        
        }else if($status == 'success'){

            $all_orders = Orders::where('order_status',1)->paginate(10);

        }else if($status == 'process'){

            $all_orders = Orders::where('order_status',0)->paginate(10);

        }else{
            $all_orders = Orders::paginate(10);
        }

        $count_order_process = Orders::where('order_status',0)->count();
        $count_order_success = Orders::where('order_status',1)->count();
        $count_order_unset = Orders::onlyTrashed()->count();

        $count = [$count_order_process,$count_order_success, $count_order_unset];
        // $all_orders= Orders::paginate(10);
        
        
        return view('admin.order.list',compact('all_orders','count','list_act'));

    }

    function set_status($id){

        Orders::where('id',$id)
        ->update(
            [
                'order_status'=> 1,
                
            ]
        );
        return redirect('admin/order/list');
    }
    function detail($id)
    {
        $info_user = DB::table('orders')
        ->join('users','orders.user_id','=','users.id')
        ->select('orders.*','users.name','users.phone','users.address')->where('orders.id',$id)
        ->first();

        $all_orders = DB::table('orders')
        ->join('orderdetails','orderdetails.order_id','=','orders.id')
        ->select('orderdetails.*')
        ->where('orders.id',$id)
        ->get();
        
        return view('admin.order.detail',compact('all_orders','info_user'));
    }
    function delete($id){

        $order = Orders::find($id);
        $order->delete();

        return redirect('admin/order/list')->with('status','Đã xoá thành công');
    }
    function restore($id){
        
        Orders::withTrashed()
        ->where('id',$id)
        ->restore();
        return redirect('admin/order/list')->with('status','Đã khôi phục thành công đơn hàng này');
    }

    function action(Request $request)
    {
        $list_check = $request->input('list_check');
        if($list_check){
            
            if(!empty($list_check)){
                $act = $request->input('act');
                if( $act == 'delete'){
                    Orders::destroy($list_check);
                    return redirect('admin/order/list')->with('status','Đã xóa thành công');
                }
                if( $act == 'restore'){
                    Orders::withTrashed()->whereIn('id',$list_check)
                    ->restore();
                    return redirect('admin/order/list')->with('status','Đã khôi phục thành công');
                }
                if($act == 'forceDelete'){
                    Orders::withTrashed()
                    ->whereIn('id',$list_check)
                    ->forceDelete();
                    return redirect('admin/order/list')->with('status','Bạn đã xóa vĩnh viễn đơn hàng thành công');
                }
            }
        }else{
            return redirect('admin/order/list')->with('status','Cần chọn phần tử để thực hiện');
        }
    }


}
