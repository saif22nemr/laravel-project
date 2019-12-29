<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    //
    

    	///use SoftDeletes;
    //$table = 'posts'; // that when class name not equal table name
    //$primaryKey = 'id';//that the same thing
    protected $fillable = [
    	'id',
    	'title',
    	'body',
        'slug'
    ];
    
    public function user(){
    	return $this->belongsTo('App\User','id');
    }
    public function users(){
    	return $this->hasMany('App\User','id');
    }
    public function images(){
        return $this->morphMany('App\Photo','image');
    }
    public function setNameAttribute($value){
        $this->attribute['name'] = ucwords($value);
    }
    public static function scopeGetLatest($query){
        return $query->orderBy('id','desc')->take(1)->get();
    }
}
