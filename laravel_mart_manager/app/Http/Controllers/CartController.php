<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    //
    function show(){
        return view('pages.cart.show');
    }
    function add(Request $request,$id)
    {
        
        $product = Product::find($id);
        
        Cart::add([
            'id'=>$product->id,
            'name'=>$product->name,
            'qty'=>1,
            'price'=>$product->price,
            'options'=>['photo'=>$product->photo]
        ]);
        return redirect('cart');
    }

    function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect('cart');
    }

    function destroy()
    {
        Cart::destroy();
        return redirect('cart');
    }

    function update(Request $request)
    {
        $data = $request->get('qty');
        foreach($data as $k => $v){
            Cart::update($k,$v);
        }

        return redirect('cart');
        
    }
    
    function checkout(Request $request)
    {
        // return dd(Cart::content());
        ## insert into orders
        $order_data = array();
        $order_data['user_id'] = Auth::id();
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 0;
        $order_data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $order_id = DB::table('orders')->insertGetId($order_data);

        ## insert into orderdetails
        
        foreach(Cart::content() as $value){

            $od_data = array();
            $od_data['order_id'] = $order_id;
            $od_data['product_id'] = $value->id;
            $od_data['product_name'] =  $value->name;
            $od_data['product_photo']= $value->options->photo;
            $od_data['price'] =  $value->price;
            $od_data['quantity'] =  $value->qty;
          
            $od_data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
            DB::table('orderdetails')->insert($od_data);
        }
        Cart::destroy();    
        return view('pages.cart.checkout');    
    }

}
