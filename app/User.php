<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords($value);
    }
    public function setEmailAttribute($value){
        $this->attributes['email'] = $value;
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function photo(){
        return $this->morphMany('App\Photo','image');
    }
    public function posts(){
        return $this->hasOne('App\Posts','is_admin');
    }
    public function Comments(){
        return $this->hasMany('App\Comment','users_id');
    }
    public function Categories(){
        return $this->hasMany('App\Categories');
    }
    public function Items(){
        return $this->hasMany('App\Item');
    }
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
