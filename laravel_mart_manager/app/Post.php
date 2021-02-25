<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = true;//set time to false
    protected $fillable = ['title','content','thumbnail','cate_id','status'];

    protected $table = 'post';

    function categorypost(){
        return $this->belongsTo('App\CategoryPost');
    }

}   
