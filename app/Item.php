<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable =[
    	'name',
    	'description',
    	'categories_id',
    	'users_id'
    ];
    public function User(){
    	return $this->belongsTo('App\User');
    }
    public function Category(){
    	return $this->belongsTo('App\Categories','categories_id');
    }
    public function Comments(){
    	return $this->hasMany('App\Comment');
    }
}
