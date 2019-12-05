<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    //RELACION MUCHOS A UNO (N:1) Users
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    //RELACION MUCHOS A UNO (N:1) Images
    public function image(){
        return $this->belongsTo('App\Image', 'image_id');
    }
}
