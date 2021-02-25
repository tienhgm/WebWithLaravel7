<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::where('status',1)->get();
        $products = Product::where('status',1)->get();
        return view('pages.home',compact('products','posts'));
    }
}
