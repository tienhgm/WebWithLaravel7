<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    //
    function index(){
        $products = Product::where('status',1)->get();
        return view('pages.products.allProducts',compact('products'));
    }

    function show($cate_name,$cate_product_id){
        $products = Product::where('status',1)->where('cate_product_id',$cate_product_id)->get();
        return view('pages.products.category',compact('products'));
    }

    function detail($product_name,$id){
        $product = Product::find($id);
        $cateId = $product->cate_product_id;
        $related_products = Product::where('status',1)->where('cate_product_id',$cateId)->limit(3)->get();
        
        return view('pages.products.detail',compact('product','related_products'));
    }
}
