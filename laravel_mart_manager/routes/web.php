<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

// danh muc san pham 
Route::get('shop','ProductController@index')->name('category');
Route::get('shop/{cate_name}/{cate_product_id}','ProductController@show');
Route::get('product/{product_name}/{id}','ProductController@detail');
// Route::get('admin/dashboard','DashboardController@show')->middleware('auth','checkRole');

Route::middleware('auth')->group(function(){

   
    Route::get('dashboard','DashboardController@show')->middleware('checkRole');
    ### User
    Route::get('admin/user/list','AdminUserController@list');
    Route::get('admin/user/add','AdminUserController@add');
    Route::post('admin/user/store','AdminUserController@store');
    Route::get('admin/user/delete/{id}','AdminUserController@delete')->name('delete_user');
    Route::get('admin/user/action','AdminUserController@action');
    Route::get('admin/user/edit/{id}','AdminUserController@edit')->name('user.edit');
    Route::post('admin/user/update/{id}','AdminUserController@update')->name('user.update');

    ### Category Post
    Route::get('admin/post/category/list','AdminCategoryPostController@list');
    Route::get('admin/post/category/add','AdminCategoryPostController@add');
    Route::post('admin/post/category/store','AdminCategoryPostController@store');
    Route::get('admin/post/category/edit/{id}','AdminCategoryPostController@edit')->name('edit_cate_post');
    Route::post('admin/post/category/update/{id}','AdminCategoryPostController@update')->name('cate_post.update');
    Route::get('admin/post/category/delete/{id}','AdminCategoryPostController@delete')->name('delete_cate_post');

    ### Post
    Route::get('admin/post/list','AdminPostController@list');
    Route::get('admin/post/add','AdminPostController@add');
    Route::post('admin/post/store','AdminPostController@store');
    Route::get('admin/post/set_status/{id}','AdminPostController@set_status')->name('set_status');
    Route::get('admin/post/edit/{id}','AdminPostController@edit')->name('post.edit');
    Route::post('admin/post/update/{id}','AdminPostController@update')->name('post.update');
    Route::get('admin/post/delete/{id}','AdminPostController@delete')->name('post.delete');

    ### Product
    Route::get('admin/product/category/list','AdminCategoryProductController@list');
    Route::get('admin/product/category/add','AdminCategoryProductController@add');
    Route::post('admin/product/category/store','AdminCategoryProductController@store');
    Route::get('admin/product/category/edit/{id}','AdminCategoryProductController@edit')->name('edit_cate_product');
    Route::post('admin/product/category/update/{id}','AdminCategoryProductController@update')->name('cate_product.update');
    Route::get('admin/product/category/delete/{id}','AdminCategoryProductController@delete')->name('delete_cate_product');

    Route::get('admin/product/list','AdminProductController@list');
    Route::get('admin/product/add','AdminProductController@add');
    Route::post('admin/product/store','AdminProductController@store');
    Route::get('admin/product/set_status/{id}','AdminProductController@set_status')->name('set_status_product');
    Route::get('admin/product/edit/{id}','AdminProductController@edit')->name('product.edit');
    Route::post('admin/product/update/{id}','AdminProductController@update')->name('product.update');
    Route::get('admin/product/delete/{id}','AdminProductController@delete')->name('product.delete');
    Route::get('admin/product/action','AdminProductController@action');

    ### Admin Order List 
    Route::get('admin/order/list','AdminOrderController@list');
    Route::get('admin/order/set_status/{id}','AdminOrderController@set_status')->name('set_status_order');
    Route::get('admin/order/detail/{id}','AdminOrderController@detail')->name('order.detail');
    Route::get('admin/order/restore/{id}','AdminOrderController@restore')->name('order.restore');
    Route::get('admin/order/delete/{id}','AdminOrderController@delete')->name('order.delete');
    Route::get('admin/order/action','AdminOrderController@action');

    ### Cart
    Route::get('cart','CartController@show');
    Route::get('cart/add/{id}','CartController@add')->name('cart.add');
    Route::get('cart/remove/{rowId}','CartController@remove')->name('cart.remove');
    Route::get('cart/destroy','CartController@destroy')->name('cart.destroy');
    Route::post('cart/update','CartController@update')->name('cart.update');
    ### Checkout
    Route::get('cart/checkout','CartController@checkout')->name('checkout');
    
});
