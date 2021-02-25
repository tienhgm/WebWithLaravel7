<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;
    public $timestamps = true;//set time to false
    protected $fillable = ['name','description','content','price','quantity','status','cate_product_id','photo'];
    protected $table = 'products';

    function categoryproduct(){
        return $this->belongsTo('App\CategoryProduct');
    }

}
