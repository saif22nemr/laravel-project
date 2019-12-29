<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = [
        'name',
        'path',
        'image_id',
        'image_type'
    ];
    public function create(){
        
    }
    public function image(){ //this idea for make image id muli forigen key Note: [the name of this method it's part of column name] you must takecare of that
        return $this->morphTo();
    }
}
