<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public function profile(){
    	return $this->hasMany('App\Profile');
    } 
}
