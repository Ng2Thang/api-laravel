<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Late extends Model
{
    protected $fillable = [
        'id', 'user_id', 'reason', 'time','approved'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    } 
}
