<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $fillable = [
    	'name',
    	'description'
    ];
    public function Items(){
    	return $this->hasMany('App\Item');
    }
    public function User(){
    	return $this->belongsTo('App\User');
    }

}
