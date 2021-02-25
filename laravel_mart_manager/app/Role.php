<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public $timestamps = true;//set time to false
    protected $fillable = ['name'];

    protected $table = 'roles';

    function user(){
        return $this->belongsTo('App\User');
            
    }
}
