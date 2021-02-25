<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    //
    // function AdminPost(){
    //     return $this->belongsTo('App\AdminPost');    
    // }
    public $timestamps = true;//set time to false
    protected $fillable = ['name'];
 
    protected $table = 'category_post';

    function post(){
        return $this->hasMany('App\Post');
    }
}
