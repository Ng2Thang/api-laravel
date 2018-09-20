<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',	'fullname' ,'email'	,'phone',	'address',	'identity_card', 'work_start', 'gender','birthday',	'position_id','created_at',	'updated_at'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    } 

    public function position(){
    	return $this->belongsTo('App\Position');
    } 
}	
