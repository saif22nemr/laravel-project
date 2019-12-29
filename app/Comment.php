<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
    	'comment',
    	'users_id',
    	'items_id'
    ];
    public function Users(){
    	return $this->belongsTo('App\User');
    }
    public function Items(){
    	return $this->belongsTo('App\Item');
    }
}
