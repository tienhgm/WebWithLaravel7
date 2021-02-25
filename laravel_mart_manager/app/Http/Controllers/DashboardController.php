<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    function __construct()
    {   
        // phai khai bao middle thi moi dung duoc session o trong ham khoi tao __construct
        $this->middleware(function($request,$next){
            session(['module_active'=>'dashboard']);
            return $next($request);
        });
    }

    function show(){
       
        // $new_orders = DB::table('orders')
        // ->join('users','orders.user_id','=','users.id')
        // ->select('orders.*','users.name','users.phone','users.address')
        // ->where('orders.created_at','>',$date_time)
        // ->paginate(10);
        
        $date_time = Carbon::now()->subDays(5);
        $new_orders = Orders::where('created_at','>',$date_time)->paginate(10);

        $success_orders = Orders::where('order_status','=',1)
        ->count();
        $processing_orders = Orders::where('order_status','=',0)
        ->count();
        $total_price = Orders::where('order_status','=',1)
        ->sum('order_total');
        
        $unset_orders = Orders::onlyTrashed()->count();

        return view('admin.dashboard',compact('new_orders','success_orders','processing_orders','total_price','unset_orders'));
    }

        
}
