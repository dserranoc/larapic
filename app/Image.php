<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    // RELACION UNO A MUCHOS (1:M) Comments
    public function comments(){
        return $this->hasMany('App\Comment')->orderBy('id','desc');
    }

    //RELACION UNO A MUCHOS (1:M) Likes

    public function likes(){
        return $this->hasMany('App\Like');
    }

    //RELACION MUCHOS A UNO (N:1) Users
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

}
