<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    //
    public $timestamps = true;//set time to false
    protected $fillable = ['name'];
 
    protected $table = 'category_product';

    function product(){
        return $this->hasMany('App\Product');
    }
}
