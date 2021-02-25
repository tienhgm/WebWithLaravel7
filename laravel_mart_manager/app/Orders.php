<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use SoftDeletes;
    //
    public $timestamps = true;//set time to false
    protected $fillable = ['user_id','order_total','order_status'];
    protected $table = 'orders';

    function user(){
        return $this->belongsTo('App\User');
    }
}
