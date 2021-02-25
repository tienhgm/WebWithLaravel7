<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    //
    public $timestamps = true;//set time to false
    protected $fillable = ['price','quantity','order_id','product_id','product_name'];
    protected $table = 'orderdetails';
}
