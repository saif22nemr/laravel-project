<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //Polymophic example
    protected $fillable = [
        'name'
    ];
    public function Tags(){
        return $this->morphToMany('App\Tag','taggable');
    }
}
